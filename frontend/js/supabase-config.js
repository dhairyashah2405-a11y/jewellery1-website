// Config file for Supabase connection & global cart management
const SUPABASE_URL = "https://your-project-id.supabase.co"; // REPLACE WITH YOUR SUPABASE URL
const SUPABASE_ANON_KEY = "your-anon-key"; // REPLACE WITH YOUR SUPABASE ANON KEY

let supabaseClient = null;

try {
    if (typeof supabase !== 'undefined' && SUPABASE_URL !== "https://your-project-id.supabase.co") {
        supabaseClient = supabase.createClient(SUPABASE_URL, SUPABASE_ANON_KEY);
    }
} catch (err) {
    console.warn("Supabase failed to initialize. Make sure you set your URL and Key in frontend/js/supabase-config.js", err);
}

// Global Cart Utilities (LocalStorage implementation)
const Cart = {
    get: () => JSON.parse(localStorage.getItem('cart') || '[]'),
    save: (cart) => localStorage.setItem('cart', JSON.stringify(cart)),
    
    add: (item) => {
        let cart = Cart.get();
        // Clean the price string (remove currency symbol and commas)
        const priceNum = parseFloat(String(item.price).replace(/[₹,]/g, '').trim());
        const quantityNum = parseInt(item.quantity || 1);
        
        const existing = cart.find(x => x.name === item.name);
        if (existing) {
            existing.quantity = parseInt(existing.quantity) + quantityNum;
        } else {
            cart.push({
                name: item.name,
                price: priceNum,
                image: item.image,
                quantity: quantityNum
            });
        }
        Cart.save(cart);
        Cart.updateBadge();
        alert('Product added to cart successfully!');
    },
    
    remove: (name) => {
        let cart = Cart.get();
        cart = cart.filter(x => x.name !== name);
        Cart.save(cart);
        Cart.updateBadge();
    },
    
    updateQuantity: (name, qty) => {
        let cart = Cart.get();
        const existing = cart.find(x => x.name === name);
        if (existing) {
            existing.quantity = Math.max(1, parseInt(qty));
        }
        Cart.save(cart);
        Cart.updateBadge();
    },
    
    clear: () => {
        localStorage.removeItem('cart');
        Cart.updateBadge();
    },
    
    updateBadge: () => {
        const cart = Cart.get();
        const totalCount = cart.reduce((sum, item) => sum + parseInt(item.quantity), 0);
        
        // Find shopping bag icon link to append/update badge
        const cartLink = document.querySelector('a[href*="cart"], a[href*="add to cart"]');
        if (cartLink) {
            let badge = cartLink.querySelector('.cart-badge');
            if (!badge) {
                badge = document.createElement('span');
                badge.className = 'cart-badge';
                badge.style.cssText = "position:absolute; top:-7px; right:-7px; background:#9b4d5d; color:#fff; font-size:10px; font-weight:700; width:16px; height:16px; border-radius:50%; display:flex; align-items:center; justify-content:center; border:1px solid #fff; box-shadow:0 2px 5px rgba(0,0,0,0.1);";
                cartLink.style.position = 'relative';
                cartLink.appendChild(badge);
            }
            badge.textContent = totalCount;
            badge.style.display = totalCount > 0 ? 'flex' : 'none';
        }
    }
};

// Check authentication state globally to update header user icon
async function checkGlobalAuth() {
    if (!supabaseClient) {
        // Fallback: Check local storage for dummy/existing sessions or direct user links
        const userIcon = document.querySelector('.fa-user');
        if (userIcon) {
            const wrap = userIcon.closest('.user-dropdown-wrap');
            if (wrap) {
                // If it's WAMP/PHP flow, let PHP handle it.
                // In static Vercel, if not initialized, direct to login page.
            }
        }
        return;
    }

    try {
        const { data: { user } } = await supabaseClient.auth.getUser();
        const userDropdownMenu = document.getElementById('userDropdownMenu');
        const userIconBtn = document.getElementById('userIconBtn');
        const userLink = document.querySelector('a[href*="login"], a[href*="profile"]');

        if (user) {
            // Logged in
            if (userDropdownMenu) {
                userDropdownMenu.innerHTML = `
                    <a href="profile.html"><i class="fa-regular fa-user" style="margin-right:7px;"></i>Profile</a>
                    <a href="#" id="signOutBtn"><i class="fa-solid fa-right-from-bracket" style="margin-right:7px;"></i>Logout</a>
                `;
                document.getElementById('signOutBtn').addEventListener('click', async (e) => {
                    e.preventDefault();
                    await supabaseClient.auth.signOut();
                    alert('Logged out successfully');
                    window.location.href = 'home.html';
                });
            }
            if (userLink) {
                userLink.href = 'profile.html';
            }
        } else {
            // Guest user
            if (userDropdownMenu) {
                userDropdownMenu.innerHTML = `
                    <a href="login.html"><i class="fa-regular fa-user" style="margin-right:7px;"></i>Login</a>
                    <a href="register.html"><i class="fa-solid fa-user-plus" style="margin-right:7px;"></i>Register</a>
                `;
            }
            if (userLink) {
                userLink.href = 'login.html';
            }
        }
    } catch (err) {
        console.error("Auth state check failed", err);
    }
}

document.addEventListener('DOMContentLoaded', () => {
    Cart.updateBadge();
    checkGlobalAuth();
});
