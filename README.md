# TDOT Immigration — Website Deliverable
**Built by Barrana.ai**  
**Version:** Production-ready static HTML  
**Date:** April 2025

---

## What's in this package

```
client/
├── index.html                    ← Homepage
├── about.html                    ← About page
├── contact.html                  ← Contact + form
├── styles.css                    ← All site styles (single file)
├── main.js                       ← Minimal JS (nav, FAQ, form)
├── services/                     ← 11 service pages
├── locations/                    ← 5 GTA location pages
├── blog/                         ← Blog index + 3 posts
└── public/
    ├── sitemap.xml               ← All 24 pages listed
    ├── robots.txt                ← Allow all, sitemap reference
    └── favicon.ico
```

**Total pages: 24 HTML files**

---

## Hosting — How to deploy

### Option A: Any static host (recommended)
Upload the entire `client/` folder to:
- **Cloudflare Pages** (free, fastest CDN globally)
- **Netlify** (free tier, drag-and-drop deploy)
- **Vercel** (free tier)
- **cPanel file manager** → upload to `public_html/`

The site is pure HTML/CSS/JS — no server, no database, no build step required.

### Option B: cPanel (most hosting providers)
1. Log in to cPanel → File Manager
2. Navigate to `public_html/`
3. Upload all files from `client/` into `public_html/`
4. Ensure `index.html` is at the root: `public_html/index.html`

---

## Before going live — 2 things to do

### 1. Connect the contact form (required)
The contact form is wired to Formspree. To activate it:

1. Go to **https://formspree.io** → create a free account
2. Create a new form → you'll get an endpoint ID like `xpzgkwqr`
3. Open `client/contact.html`
4. Find this line:
   ```html
   <form ... action="https://formspree.io/f/YOUR_FORMSPREE_ID" ...>
   ```
5. Replace `YOUR_FORMSPREE_ID` with your actual ID:
   ```html
   <form ... action="https://formspree.io/f/xpzgkwqr" ...>
   ```
6. Formspree free tier allows 50 submissions/month. Paid is $10/month for unlimited.
7. Alternatively use **EmailJS** or **Netlify Forms** (if hosting on Netlify)

### 2. Submit sitemap to Google Search Console (required for SEO)
1. Go to **https://search.google.com/search-console**
2. Add your property: `https://tdotimm.com`
3. Verify ownership (HTML tag method — paste into `<head>` of `index.html`)
4. Go to Sitemaps → submit: `https://tdotimm.com/sitemap.xml`

---

## Brand assets used

All images are served from Cloudfront CDN (already embedded in HTML):
- TDOT logo (header, footer)
- Shafoli Kapur portrait
- Toronto hero background

To update any image: replace the `src` URL in the relevant HTML file with your new image URL.

---

## What has been fixed vs the previous Manus version

| Issue | Status |
|---|---|
| Sitemap had unfilled `{SITE_URL}` template variables | ✅ Fixed — all 24 real URLs |
| Service card icons were text abbreviations (SP, WP, etc.) | ✅ Fixed — proper SVG icons |
| Social media links were plain text, no icons | ✅ Fixed — SVG icon buttons with hover states |
| `areaServed` missing from LocalBusiness schema | ✅ Fixed — all 6 GTA cities added |
| Contact form showed fake success, never sent anything | ✅ Fixed — Formspree integration (replace ID to activate) |
| Homepage canonical missing trailing slash | ✅ Fixed |

---

## WordPress conversion

To convert this site to WordPress so the client can manage content themselves, provide this entire `client/` folder to Claude Code with this instruction:

> "Convert this static HTML website into a WordPress theme. Create a custom theme called `tdot-immigration` that preserves the exact design. Register Custom Post Types for Services and Team Members. Use ACF for editable fields. Register all navigation menus. Output a complete theme folder ready to upload to wp-content/themes/."

---

## Contact
**Barrana.ai** — AI Workflow Automation  
Ikram Rana | ikram@barrana.ai  
50 Corstate Ave, Unit 01, Vaughan, ON L4K 4Y2
