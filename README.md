# SISTARA Jewels - Restructured for Vercel & WAMP

This project has been restructured to separate concerns into `frontend/`, `backend/`, and `api/` directories. This setup enables seamless deployment to **Vercel** as serverless PHP functions, while remaining 100% compatible with local servers like **WAMP**.

## Folder Structure

```text
├── api/             # Vercel Serverless Function entry points (thin wrappers)
├── backend/         # Core business logic, db connections, process files
├── frontend/        # User-facing pages (views) and static assets (images, uploads)
├── .htaccess        # Apache Rewrite Rules for local WAMP compatibility
├── vercel.json      # Vercel Routing and Function configurations
├── index.php        # Root fallback redirect
└── README.md        # Documentation
```

---

## Local Development (WAMP / Apache)

1. Make sure **Apache `mod_rewrite`** is enabled in your WAMP settings.
2. Put the `sistara-intership-project` folder under your `c:\wamp64\www\` directory.
3. Access it at `http://localhost/sistara-intership-project/`.
4. The `.htaccess` file will automatically map your page and image URLs behind the scenes so that they load without folder prefixes (e.g. accessing `/about` or `/about.php` routes to `/frontend/about.php` internally, and submitting to `/insert_cart.php` routes to `/backend/insert_cart.php` internally).

---

## Vercel Deployment

Vercel compiles the scripts under `api/` as serverless functions using the `vercel-php` runtime.

### Step 1: Install Vercel CLI (If not installed)
Install Vercel globally via npm:
```bash
npm install -g vercel
```

### Step 2: Login to Vercel
Login to your Vercel account:
```bash
vercel login
```

### Step 3: Configure Database Environment Variables
Since Vercel runs in a cloud environment, you cannot connect to `localhost` MySQL databases. You must host your database online (e.g., on a free Aiven MySQL, Supabase, Neon,PlanetScale, or Tidb database) and configure the credentials.

Add these **Environment Variables** in your Vercel Project Dashboard (under **Settings > Environment Variables**):

| Key | Description | Example |
| :--- | :--- | :--- |
| `DB_HOST` | Database Host Address | `your-db-hostname.aivencloud.com` |
| `DB_USER` | Database Username | `avnadmin` |
| `DB_PASSWORD` | Database Password | `your_secure_password` |
| `DB_NAME` | Main User Authentication Database Name | `user` |
| `CART_DB_NAME` | Cart Database Name | `addtocart` |
| `ORDERS_DB_NAME` | Orders Database Name | `orders` |

*(Note: If you are using a single database, you can point `DB_NAME`, `CART_DB_NAME`, and `ORDERS_DB_NAME` to the exact same database. The code will automatically create the tables inside it).*

### Step 4: Deploy
Initialize the Vercel project and deploy:
```bash
vercel
```
Follow the prompts in your terminal. Once verified, deploy to production:
```bash
vercel --prod
```
