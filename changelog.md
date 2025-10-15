# Changelog

All notable changes to the Catalyst Digital WordPress theme will be documented in this file.

## [1.0.4] - October 15, 2025 at 12:01 AM EST

### Improved
- Enhanced projects archive layout with consistent card heights
- Improved project card flexbox layout for better visual alignment
- Fixed project thumbnail placeholder height to match image thumbnails
- Better responsive design for project cards with proper content distribution

### Technical Details
- Added flexbox layout to project cards for consistent heights
- Set fixed height for project thumbnails (250px) with object-fit cover
- Improved project content layout with flex-grow for better spacing
- Enhanced placeholder thumbnail styling to match image dimensions
- Added margin-top auto to buttons for proper bottom alignment

## [1.0.3] - October 14, 2025 at 11:56 PM EST

### Changed
- Updated navigation menu hover effect to use simple text color change instead of button background
- Improved menu hover performance by optimizing CSS transition property
- Menu items now change to primary color on hover without background styling

### Technical Details
- Removed background-color and white text color from menu hover states
- Changed transition from 'all' to 'color' for better performance
- Simplified hover effect to only change text color to primary color (#E27D3D)
- Maintained smooth color transition animation

## [1.0.2] - October 14, 2025 at 11:49 PM EST

### Fixed
- Logo layout in header - text now appears to the right of logo image instead of below
- Resolved nested link structure issue with WordPress custom logo function
- Improved header branding layout with proper flexbox alignment

### Technical Details
- Restructured header.php to use separate logo wrapper div
- Updated CSS to use flexbox for horizontal logo and text alignment
- Fixed custom logo display to work properly with WordPress the_custom_logo() function
- Logo text "Catalyst Digital" now displays horizontally next to logo image

## [1.0.1] - October 14, 2025 at 11:39 PM EST

### Added
- Projects Custom Post Type (CPT) with full archive support
- Archive template for projects (`archive-projects.php`)
- Single project template (`single-projects.php`)
- Project portfolio grid layout with thumbnails and excerpts
- Project archive pagination support
- Call-to-action section on projects archive page
- Custom post type registration with proper labels and capabilities
- Archive URL slug set to `/projects` for clean URLs

### Technical Details
- Registered 'projects' CPT with public archive functionality
- Template hierarchy properly implemented for project archives
- Responsive project grid layout with CSS Grid
- SEO-friendly project archive structure
- WordPress rewrite rules configured for custom post type archives

## [1.0.0] - October 14, 2025 at 11:22 PM EST

### Added
- Initial release of Catalyst Digital WordPress theme
- Core WordPress theme functionality with modern features
- Custom page templates for Home, About, and Contact pages
- Responsive design with Inter font family
- Custom logo support
- Navigation menu support (Primary and Footer)
- Widget areas for footer content
- Custom post navigation
- HTML5 markup support
- Custom excerpt length and styling
- Composer integration for WordPress development
- Proper .gitignore configuration
- Theme screenshot and documentation

### Technical Details
- WordPress theme standards compliant
- Mobile-first responsive design
- Clean, semantic HTML structure
- Modern CSS with custom properties
- JavaScript functionality for enhanced user experience
- SEO-friendly markup and structure
