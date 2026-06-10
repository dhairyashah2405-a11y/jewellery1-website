<?php
header('Content-Type: application/javascript');
require_once __DIR__ . '/../backend/env_loader.php';

$supabase_url = getenv('NEXT_PUBLIC_SUPABASE_URL') ?: '';
$supabase_anon_key = getenv('NEXT_PUBLIC_SUPABASE_ANON_KEY') ?: '';

// JavaScript content output:
?>
// Config file for Supabase connection & global cart management
const SUPABASE_URL = "<?php echo addslashes($supabase_url); ?>";
const SUPABASE_ANON_KEY = "<?php echo addslashes($supabase_anon_key); ?>";

let supabaseClient = null;

try {
    if (typeof supabase !== 'undefined' && SUPABASE_URL) {
        supabaseClient = supabase.createClient(SUPABASE_URL, SUPABASE_ANON_KEY);
    }
} catch (err) {
    console.warn("Supabase failed to initialize. Make sure you set your URL and Key in environment variables.", err);
}

// Fallback products when Supabase connection fails or database is empty
const DEFAULT_PRODUCTS = [
    { name: "Gold Plated Diamond Ring", price: 1499, original_price: 3099, image: "ring images/1.jpg", collection: "rings", availability: "in-stock", sales: 250, date: "2026-05-15", featured: true, stock: 15, description: "Beautiful premium gold-plated diamond engagement ring." },
    { name: "Clara 925 Sterling Silver Sky Blue Heart Set", price: 2468, original_price: 3998, image: "ring images/2.jpg", collection: "rings", availability: "in-stock", sales: 180, date: "2026-05-15", featured: true, stock: 10, description: "A complete elegant jewelry set with 925 sterling silver chain, bracelet, and ring featuring sky blue heart crystals." },
    { name: "YouBella Silver Plated Solitaire Crystal Ring", price: 169, original_price: 3099, image: "ring images/3.jpg", collection: "rings", availability: "in-stock", sales: 250, date: "2026-05-15", featured: false, stock: 20, description: "Stylish silver plated crystal ring suitable for daily wear." },
    { name: "Classic Gold Plated Plain Wedding Band Ring", price: 236, original_price: 999, image: "ring images/4.jpg", collection: "rings", availability: "in-stock", sales: 120, date: "2026-05-15", featured: false, stock: 18, description: "Minimalist gold plated wedding band with a smooth polished finish." },
    { name: "925 Sterling Silver Diamond Engagement Ring", price: 2000, original_price: 3099, image: "ring images/5.jpg", collection: "rings", availability: "in-stock", sales: 150, date: "2026-05-15", featured: true, stock: 8, description: "Classic sterling silver engagement ring adorned with sparkling CZ diamonds." },
    { name: "Fashionable Silver Plated Heart Adjustable Ring", price: 3000, original_price: 6000, image: "ring images/6.jpg", collection: "rings", availability: "in-stock", sales: 90, date: "2026-05-01", featured: false, stock: 12, description: "Adjustable silver plated heart ring for women." },
    { name: "YouBella Adjustable Heart Shaped Proposal Ring", price: 3000, original_price: 6000, image: "ring images/7.jpg", collection: "rings", availability: "in-stock", sales: 85, date: "2026-05-01", featured: false, stock: 10, description: "Perfect proposal ring with adjustable design and silver plating." },
    { name: "Okos Rhodium Plated Solitaire Style Heart Ring", price: 5000, original_price: 7000, image: "ring images/9.jpg", collection: "rings", availability: "in-stock", sales: 95, date: "2026-05-01", featured: false, stock: 5, description: "Rhodium plated solitaire style adjustable heart finger ring with CZ stone." },
    { name: "Fashionable Silver Plated Chain Ring", price: 7000, original_price: 8000, image: "ring images/10.jpg", collection: "rings", availability: "in-stock", sales: 60, date: "2026-05-01", featured: false, stock: 14, description: "Stylish chain style ring silver plated." },
    { name: "Stylish Silver Plated Kada Bracelet with AD Stones", price: 499, original_price: 1999, image: "bracelet images/1.jpg", collection: "bracelets", availability: "in-stock", sales: 180, date: "2026-05-10", featured: false, stock: 12, description: "Elegant Kada style bracelet with sparkling American Diamond stones." },
    { name: "GIVA 925 Silver Jewellery Bracelet", price: 1600, original_price: 1999, image: "bracelet images/2.jpg", collection: "bracelets", availability: "in-stock", sales: 140, date: "2026-05-10", featured: false, stock: 9, description: "Premium GIVA silver jewelry bracelet with warranty." },
    { name: "THE MARKETVILLA Pure 925 Silver Bracelet", price: 2399, original_price: 4999, image: "bracelet images/3.jpg", collection: "bracelets", availability: "in-stock", sales: 110, date: "2026-05-10", featured: false, stock: 15, description: "Pure 925 sterling silver bracelet." },
    { name: "SALTY Anti Tarnish Retro Bracelet", price: 899, original_price: 999, image: "bracelet images/4.jpg", collection: "bracelets", availability: "in-stock", sales: 220, date: "2026-05-10", featured: false, stock: 22, description: "Retro-inspired anti-tarnish everyday bracelet." },
    { name: "Nilu's Collection Infinity Shape CZ Bracelet", price: 289, original_price: 1999, image: "bracelet images/5.jpg", collection: "bracelets", availability: "in-stock", sales: 185, date: "2026-05-10", featured: false, stock: 14, description: "Infinity shaped cubic zirconia diamond bracelet." },
    { name: "Sterling Silver 925 Heart Charm Bracelet", price: 3000, original_price: 7500, image: "bracelet images/6.jpg", collection: "bracelets", availability: "in-stock", sales: 80, date: "2026-05-10", featured: false, stock: 8, description: "Heart charm adjustable everyday wear bracelet." },
    { name: "Shining Diva D'Vine Black Onyx Beads Bracelet", price: 299, original_price: 499, image: "bracelet images/7.jpg", collection: "bracelets", availability: "in-stock", sales: 300, date: "2026-05-10", featured: false, stock: 30, description: "Unisex beads healing yoga reiki bracelet." },
    { name: "Cubic Zirconia American Diamond Bracelet", price: 1000, original_price: 2999, image: "bracelet images/9.jpg", collection: "bracelets", availability: "in-stock", sales: 125, date: "2026-05-10", featured: false, stock: 11, description: "Beautiful adjustable CZ/AD bracelet." },
    { name: "Shining Diva Royal Blue Crystal CZ Bracelet", price: 499, original_price: 999, image: "bracelet images/10.jpg", collection: "bracelets", availability: "in-stock", sales: 150, date: "2026-05-10", featured: false, stock: 25, description: "Royal blue crystal silver plated bracelet." },
    { name: "Diamond Stud Earrings", price: 3999, original_price: 7499, image: "earring images/1.jpg", collection: "earrings", availability: "in-stock", sales: 320, date: "2026-05-18", featured: true, stock: 15, description: "Premium diamond stud earrings for a classic look." },
    { name: "CLARA 925 Sterling Silver Drop Earrings", price: 1999, original_price: 3999, image: "earring images/2.jpg", collection: "earrings", availability: "in-stock", sales: 210, date: "2026-05-18", featured: true, stock: 10, description: "Platinum-plated sterling silver drop earrings." },
    { name: "HIGHSPARK 925 Silver Solitaire Stud Earrings", price: 599, original_price: 1199, image: "earring images/3.jpg", collection: "earrings", availability: "in-stock", sales: 310, date: "2026-05-18", featured: true, stock: 30, description: "Highspark silver solitaire studs." },
    { name: "GIVA 925 Silver Nikita's Hollow Zircon Drop Studs", price: 2719, original_price: 6000, image: "earring images/4.jpg", collection: "earrings", availability: "in-stock", sales: 105, date: "2026-05-18", featured: true, stock: 7, description: "Elegant hollow zircon drop stud earrings from GIVA." },
    { name: "GIVA 925 Silver Jewellery Gifts Earrings", price: 3999, original_price: 7499, image: "earring images/5.jpg", collection: "earrings", availability: "in-stock", sales: 130, date: "2026-05-18", featured: true, stock: 12, description: "Beautiful silver earrings set by Giva." },
    { name: "I Jewels 18Kt Gold Plated Stud Earrings", price: 2399, original_price: 5499, image: "earring images/6.jpg", collection: "earrings", availability: "in-stock", sales: 160, date: "2026-05-18", featured: true, stock: 18, description: "Gold plated classic studs." },
    { name: "Luxury Pearl Necklace", price: 5299, original_price: 9999, image: "necklace images/10.jpg", collection: "necklace", availability: "in-stock", sales: 110, date: "2026-05-05", featured: false, stock: 6, description: "Exquisite luxury pearl necklace for special occasions." },
    { name: "Elegant Gold Drops Necklace Set", price: 1299, original_price: 2499, image: "necklace images/2.jpg", collection: "necklace", availability: "in-stock", sales: 140, date: "2026-05-12", featured: false, stock: 16, description: "Elegant gold drops matching any necklace." },
    { name: "Silver Diamond Pendant Necklace", price: 899, original_price: 1799, image: "necklace images/3.jpg", collection: "necklace", availability: "in-stock", sales: 90, date: "2026-05-01", featured: false, stock: 14, description: "Silver diamond pendant necklace." },
    { name: "Charming Pearl Bracelet and Necklace Set", price: 599, original_price: 1199, image: "necklace images/4.jpg", collection: "necklace", availability: "in-stock", sales: 210, date: "2026-05-14", featured: true, stock: 11, description: "Charming pearl bracelet." },
    { name: "Vintage Gold Chain Necklace", price: 2999, original_price: 5999, image: "necklace images/5.jpg", collection: "necklace", availability: "out-of-stock", sales: 75, date: "2026-05-08", featured: false, stock: 0, description: "Vintage-styled gold chain necklace." }
];

// Global Cart Utilities (LocalStorage implementation)
const Cart = {
    get: () => JSON.parse(localStorage.getItem('cart') || '[]'),
    save: (cart) => localStorage.setItem('cart', JSON.stringify(cart)),
    
    add: (item) => {
        let cart = Cart.get();
        const priceNum = parseFloat(String(item.price).replace(/[₹,]/g, '').trim());
        const quantityNum = parseInt(item.quantity || item.qty || 1);
        
        const existing = cart.find(x => x.name === item.name);
        if (existing) {
            existing.quantity = parseInt(existing.quantity) + quantityNum;
            existing.qty = existing.quantity;
        } else {
            cart.push({
                name: item.name,
                price: priceNum,
                image: item.image,
                quantity: quantityNum,
                qty: quantityNum
            });
        }
        Cart.save(cart);
        Cart.updateBadge();
        alert('Product added to cart successfully!');
        window.location.href = 'cart.html';
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
            existing.qty = existing.quantity;
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
        return;
    }

    try {
        const { data: { user } } = await supabaseClient.auth.getUser();
        const userDropdownMenu = document.getElementById('userDropdownMenu');
        const userLink = document.querySelector('a[href*="login"], a[href*="profile"]');

        if (user) {
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
