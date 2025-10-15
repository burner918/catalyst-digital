# Catalyst Digital WordPress Theme

A modern and professional custom WordPress theme for Catalyst Digital, a digital media agency. This theme features custom post types, contact form integration, REST API endpoints, and a comprehensive lead management system.

## Theme Details

- **Theme Name:** Catalyst Digital
- **Version:** 1.1.3
- **Primary Color:** #E27D3D (Orange)
- **Accent Color:** #93E9BE (Mint Green)
- **Font Family:** Inter (Google Fonts)
- **Last Updated:** October 15, 2025

## Features

### Core Features
- Fully responsive design (mobile, tablet, desktop)
- Custom page templates for Home, About, and Contact pages
- Modern and professional aesthetic with hero background image
- Sticky header with mobile menu
- Smooth scroll navigation
- Custom color scheme using CSS variables
- Clean, semantic HTML5 markup
- Accessibility features (ARIA labels, keyboard navigation)
- SEO-friendly structure

### Advanced Features
- **Custom Post Types:** Projects and Leads management
- **Contact Form Integration:** Automatic lead creation from form submissions
- **REST API Endpoints:** Health monitoring and system status
- **Lead Management:** Complete CRM functionality for contact form submissions
- **Project Portfolio:** Custom post type for showcasing work
- **Organized Asset Structure:** Separate folders for CSS, JS, and images
- **GitHub Actions:** Automated release and deployment workflow

## File Structure

```
catalyst-digital/
├── style.css                     # Theme header and main stylesheet reference
├── functions.php                 # Theme functions, CPTs, and WordPress hooks
├── header.php                   # Site header with navigation
├── footer.php                   # Site footer
├── index.php                    # Default template fallback
├── page-home.php                # Home page template (for slug: 'home')
├── page-about.php               # About page template (for slug: 'about')
├── page-contact.php             # Contact page template (for slug: 'contact')
├── archive-projects.php         # Projects archive template
├── single-projects.php          # Single project template
├── assets/
│   ├── css/
│   │   └── style.css            # Main theme stylesheet
│   ├── js/
│   │   └── scripts.js           # JavaScript for mobile menu and interactions
│   └── images/
│       ├── hero-banner-optimized.jpg
│       ├── strategy.png
│       ├── web-development.png
│       ├── digital-marketing.png
│       ├── data-analytics.png
│       ├── creative.png
│       └── growth-consulting.png
├── vendor/                      # Composer dependencies
├── composer.json               # PHP dependencies
├── changelog.md                # Development history
└── README.md                   # This file
```

## Setup Instructions

### 1. Theme Installation

1. Upload the `catalyst-digital` folder to `/wp-content/themes/`
2. Activate the theme through the WordPress admin panel (Appearance > Themes)
3. The theme will automatically register custom post types and set up necessary functionality

### 2. Page Setup

Create the required pages with specific slugs:

1. Go to **Pages > Add New**
2. Create pages with these exact titles and slugs:
   - **Home** (slug: `home`)
   - **About** (slug: `about`) 
   - **Contact** (slug: `contact`)

3. For each page, select the corresponding template:
   - "Home Page" for the home page
   - "About Page" for the about page
   - "Contact Page" for the contact page

4. Set your homepage:
   - Go to **Settings > Reading**
   - Select "A static page" for "Your homepage displays"
   - Choose "Home" as the Homepage

### 3. Menu Configuration

1. Go to **Appearance > Menus**
2. Create a new menu called "Primary Menu"
3. Add your pages (Home, About, Contact) to the menu
4. Assign the menu to the "Primary Menu" location
5. Optionally create a "Footer Menu" for the footer location

### 4. Custom Post Types Setup

The theme automatically registers two custom post types:

#### Projects CPT
- **Purpose:** Portfolio showcase and case studies
- **URL:** `/projects/`
- **Admin Menu:** Projects (with portfolio icon)
- **Features:** Featured images, excerpts, full editor support
- **Templates:** Archive and single project templates included

#### Leads CPT
- **Purpose:** Contact form submission management
- **Admin Menu:** Leads (with email icon)
- **Features:** Automatic creation from contact form, custom meta fields
- **Access:** Admin-only (not publicly accessible)

### 5. Contact Form Configuration

The contact form is fully functional and includes:

- **Client-side validation:** Real-time email and phone validation
- **Server-side processing:** Automatic lead creation
- **Email notifications:** Admin notifications for new submissions
- **Lead management:** All submissions stored as Lead posts

No additional plugins required - the form works out of the box.

## Customization

### Logo Setup
1. Go to **Appearance > Customize > Site Identity**
2. Upload your logo (recommended size: 250x60px)
3. The theme will automatically display it in the header

### Color Customization
The theme uses CSS variables defined in `/assets/css/style.css`:

```css
:root {
    --primary-color: #E27D3D;    /* Orange */
    --accent-color: #93E9BE;     /* Mint Green */
}
```

### Service Icons
Replace the PNG icons in `/assets/images/` with your own:
- `strategy.png`
- `web-development.png`
- `digital-marketing.png`
- `data-analytics.png`
- `creative.png`
- `growth-consulting.png`

### Hero Background
Replace `/assets/images/hero-banner-optimized.jpg` with your own hero image.

## Technical Implementation

### Theme Development Process

1. **Initial Setup:**
   - Created basic WordPress theme structure
   - Implemented responsive design with Inter font
   - Added custom page templates for Home, About, Contact

2. **Custom Post Types:**
   - Registered Projects CPT with full archive support
   - Created Leads CPT for contact form management
   - Implemented custom meta boxes and admin columns

3. **Contact Form Integration:**
   - Built client-side validation with JavaScript
   - Implemented server-side processing in functions.php
   - Added automatic lead creation and email notifications

4. **Asset Organization:**
   - Restructured files into organized folders
   - Separated CSS, JavaScript, and images
   - Updated all asset references

5. **Advanced Features:**
   - Added REST API healthcheck endpoint
   - Implemented GitHub Actions for automated releases
   - Enhanced form validation and user experience

### Database Structure

The theme creates the following database entries:
- Custom post types: `projects`, `leads`
- Custom meta fields for leads: `_lead_name`, `_lead_email`, `_lead_phone`, `_lead_message`, `_lead_submitted_date`
- WordPress rewrite rules for custom post type archives

### REST API Endpoints

- **Health Check:** `/wp-json/healthcheck/v1/ping`
  - Returns system status, WordPress version, database connectivity
  - Useful for monitoring and diagnostics

## Browser Support

- Chrome (latest)
- Firefox (latest)
- Safari (latest)
- Edge (latest)
- Mobile browsers (iOS Safari, Chrome Mobile)

## Development Workflow

### GitHub Actions
The theme includes automated release workflow:
- Triggers on release creation
- Creates clean zip file excluding development files
- Automatically uploads release assets

### Composer Integration
- PHP dependencies managed via Composer
- WordPress stubs for development
- Autoloading configured

## AI Prompts Used

The following prompts were used during the development of this WordPress theme:

#### Prompt 1: Initial Theme Creation
Build a custom theme for a Digital Media Agency company called "Catalyst Digital" in this folder 'catalyst-digital' as the theme's folder. The theme should use #E27D3D as the primary color and #93E9BE as the accent color. The theme should include templates for the home page (slug 'home'), the About page (slug 'about'), and the contact page (slug 'contact). The site's header and footer must be responsive. Do not use any external themes, templates, etc. The theme should have a modern and professional aesthetic.

#### Prompt 2: Projects Custom Post Type
Register a custom post type (CPT) "Projects" ('projects'). The projects CPT needs to have a title (post title), thumbnail (featured image), and a description (post content). Also, provide an Archive and a Single template for the projects.

#### Prompt 3: Project Archive Layout Fixes
For the projects archive page, for the project cards, align the View Project button vertically across all the cards. Currently, the View Project button is not consistenly aligned vertically due to the varying title and text content for each project. Also, for the project card, for the card image, set a consistent height across all cards.

#### Prompt 4: Health Check Endpoint
Next, I want to add a minimal healthcheck endpoint (e.g., /wp-json/healthcheck/v1/ping returning some basic health diagnostics

#### Prompt 5: Leads Custom Post Type
Create another custom post type called Leads (leads) such that all contact form submissions are inserted as CPTs. This CPT should have the same fields as that in the contact form, i.e. Name, Email, Phone Number, Message. Remove the "Subject" field from the form.  Also in the contact form, change the label from "Your Name" to "Name", change "Your Email" to "Email", change "Phone Number" to "Phone

#### Prompt 6: Phone Input Formatting
In the Contact form, make the following changes to the phone input field. First, I want this field to only allow numbers. Currently it accepts text as well. Second, as the user types, I want the phone number to be formatted in the US Phone format, e.g. (555) 636-1828 as the user is typing.

#### Prompt 7: Form Placeholders
Add placeholders for the Name, Email, and Message inputs John Doe, your@email.com and 'Please tell us about the project you have in mind. The more information the better'

#### Prompt 8: Email Validation
For the email input field, set up input validation so that if the text input doesn't have an email form, the user is provided with an inline error message indicating that it is not a valid email (instead of having to submit the form to realize this)

#### Prompt 9: Email Input Styling Fix
Great! Remove the green outline on the email input field when a valid input format is entered as this makes this field look inconsistent with the other inputs.

#### Prompt 10: Form Focus and Styling
Set the asterisk color to the primary color and when the contact page loads, set autofocus to the Name field so the user can start typing right away.

#### Prompt 11: Directory Structure Organization
I want to organize the directory structure a bit. Create an /assets folder in the root. Within this assets folder, move the current js folder. Within the assets folder, create a folder called css and move the style.css inside this css folder. Move the images folder within this assets folder as well. Make sure to update all references now that they're in a new location.

#### Prompt 12: GitHub Actions Workflow
Write a GitHub Action workflow that triggers on release creation, zips my WordPress theme excluding .git, .github, vendor, node_modules, .gitignore, composer.json, composer.lock, and .DS_Store files, then attaches the zip as a release asset named catalyst-digital.zip

## Support

For issues or questions, please contact the development team.

## License

This theme is licensed under the GNU General Public License v2 or later.

## Development Timeline

This WordPress theme was built in **4 hours**, demonstrating my rapid development capabilities while maintaining professional quality and functionality. I did not spend much time at all with the styling and went with the basics that the AI used. I have a ton of opinion and preferences on the styling, but chose not to invest time into that as I interprested the purpose of the trial was to set up a staging site with the desired structure and demonstrate my process, not my design skills. If I were to focus on design, I'd spend more time setting up more classes for styles to ensure consistent aesthetic. For e.g. the button border radii would be consistent with the border radius of input fields, I'd use less of the gradient fills that AI loves to use, consolidate my typography into a couple of styles (Heading and Body), and a lot more.

### Future Enhancement Opportunities

With additional development time, the following improvements could be implemented:

- **Better Styling**: Enhanced visual design, animations, and micro-interactions
- **Custom Icons**: Replace emoji usage with custom SVG icons for a more professional appearance
- **Enhanced User Experience**: More interactive elements, improved form feedback, and advanced user interactions
- **SMTP Configuration**: Set up proper SMTP for admin email notifications to ensure reliable delivery.
- **Acknowledgment Email for Visitor**: Set up a nice looking acknowledgment email to any visitor who fills out the contact form

---

**Developed for Catalyst Digital**  
*Last Updated: October 15, 2025*
