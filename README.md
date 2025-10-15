# Catalyst Digital WordPress Theme

A modern and professional custom WordPress theme for Catalyst Digital, a digital media agency.

## Theme Details

- **Theme Name:** Catalyst Digital
- **Version:** 1.0.0
- **Primary Color:** #E27D3D (Orange)
- **Accent Color:** #93E9BE (Mint Green)

## Features

- Fully responsive design (mobile, tablet, desktop)
- Custom page templates for Home, About, and Contact pages
- Modern and professional aesthetic
- Sticky header with mobile menu
- Smooth scroll navigation
- Custom color scheme using CSS variables
- No external themes or templates
- Clean, semantic HTML5 markup
- Accessibility features (ARIA labels, keyboard navigation)
- SEO-friendly structure

## File Structure

```
catalyst-digital/
├── style.css                 # Main theme stylesheet with all styles
├── functions.php             # Theme functions and WordPress hooks
├── header.php               # Site header with navigation
├── footer.php               # Site footer
├── index.php                # Default template fallback
├── page-home.php            # Home page template (for slug: 'home')
├── page-about.php           # About page template (for slug: 'about')
├── page-contact.php         # Contact page template (for slug: 'contact')
├── js/
│   └── scripts.js           # JavaScript for mobile menu and interactions
├── screenshot.png           # Theme screenshot (needs actual image)
└── README.md               # This file
```

## Installation

1. Upload the `catalyst-digital` folder to `/wp-content/themes/`
2. Activate the theme through the WordPress admin panel (Appearance > Themes)
3. Create three pages with the following slugs:
   - `home` - Will use the Home template
   - `about` - Will use the About template
   - `contact` - Will use the Contact template
4. Set the "home" page as your front page (Settings > Reading)

## Page Setup

After activating the theme:

1. Go to **Pages > Add New**
2. Create pages with these titles:
   - Home
   - About
   - Contact

3. For each page:
   - Click the "Page Attributes" section in the right sidebar
   - Select the corresponding template:
     - "Home Page" for the home page
     - "About Page" for the about page
     - "Contact Page" for the contact page

4. Set your homepage:
   - Go to **Settings > Reading**
   - Select "A static page" for "Your homepage displays"
   - Choose "Home" as the Homepage
   - Optionally choose a Posts page

## Menu Setup

1. Go to **Appearance > Menus**
2. Create a new menu called "Primary Menu"
3. Add your pages (Home, About, Contact) to the menu
4. Assign the menu to the "Primary Menu" location
5. Optionally create a "Footer Menu" for the footer location

## Customization

### Logo
1. Go to **Appearance > Customize > Site Identity**
2. Upload your logo
3. The theme will automatically display it in the header

### Colors
The theme uses CSS variables defined in style.css. To change colors, edit these variables:
- `--primary-color: #E27D3D;` (Orange)
- `--accent-color: #93E9BE;` (Mint Green)

### Footer Widgets
The theme includes 3 footer widget areas. To use them:
1. Go to **Appearance > Widgets**
2. Add widgets to "Footer 1", "Footer 2", or "Footer 3"

## Browser Support

- Chrome (latest)
- Firefox (latest)
- Safari (latest)
- Edge (latest)
- Mobile browsers (iOS Safari, Chrome Mobile)

## Contact Form

The contact form on the Contact page includes basic client-side validation. For full functionality, you'll need to either:
1. Add server-side processing in functions.php for the `catalyst_contact_form` action
2. Use a contact form plugin like Contact Form 7 or WPForms

## Support

For issues or questions, please contact the development team.

## License

This theme is licensed under the GNU General Public License v2 or later.

---

**Developed for Catalyst Digital**
