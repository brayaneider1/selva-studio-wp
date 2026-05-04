# Selva Studio — Agency Platform

Professional digital agency website built on WordPress with custom PHP architecture, lead management system, and REST API.

---

## Live Demo
🌐 https://immaculate-ape-b390a3.instawp.site/

---

## Stack
- WordPress 6.x + PHP 8.2
- Advanced Custom Fields (ACF)
- Custom Plugin: `selva-studio-core`
- Vanilla HTML5 / CSS3 / JavaScript
- Deploy: Railway + Vercel

---

## Features
- Custom Post Types: Servicios, Proyectos
- Lead management system with admin dashboard
- Quote calculator with AJAX submission
- REST API 
- 100% parametrizable 

---

## Local Setup
```bash
# 1. Clone repo
git clone https://github.com/brayan/selva-studio-wp

# 2. Install LocalWP and create a new site

# 3. Copy wp-content to your local site

# 4. Activate theme + plugin from wp-admin

# 5. Done
```

---

## Parametrize
Edit `/wp-content/themes/selva-child/config.php` to change name, colors, fonts and content.

---

## API
```
GET /wp-json/selva/v1/servicios
GET /wp-json/selva/v1/proyectos
POST /wp-json/selva/v1/cotizar
```

---

## Developed by
[Brayan Esneider](https://latindev.world) · Selva Studio · Florencia, Caquetá · 2026
