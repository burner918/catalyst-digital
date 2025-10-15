# Changelog

All notable changes to the Catalyst Digital WordPress theme will be documented in this file.

## [1.1.3] - October 15, 2025 at 1:25 AM EST

### Fixed
- GitHub Action workflow release asset upload using GitHub CLI
- Replaced problematic upload actions with direct GitHub CLI commands
- Added additional permissions for workflow execution

### Technical Details
- Switched to using `gh release upload` command for more reliable asset uploads
- Added `actions: read` permission in addition to `contents: write`
- Used `--clobber` flag to overwrite existing assets if they exist
- GitHub CLI approach bypasses common permission issues with upload actions

## [1.1.2] - October 15, 2025 at 1:21 AM EST

### Fixed
- GitHub Action workflow permissions issue for release asset uploads
- Updated workflow to use modern softprops/action-gh-release action
- Added explicit contents: write permissions for release asset uploads

### Technical Details
- Added `permissions: contents: write` to workflow for proper GitHub token permissions
- Replaced deprecated `actions/upload-release-asset@v1` with `softprops/action-gh-release@v1`
- Simplified upload configuration for better reliability
- Fixed "Resource not accessible by integration" error

## [1.1.1] - October 15, 2025 at 1:16 AM EST

### Added
- GitHub Action workflow for automated release asset creation
- Automated zip file generation on release creation
- Release workflow that excludes development files (.git, .github, vendor, node_modules, etc.)
- Automatic attachment of catalyst-digital.zip to GitHub releases

### Technical Details
- Created `.github/workflows/release.yml` for automated release process
- Workflow triggers on release creation events
- Uses rsync to copy theme files while excluding development dependencies
- Creates clean zip archive named `catalyst-digital.zip`
- Automatically uploads zip file as release asset using GitHub Actions
- Excludes: .git, .github, vendor, node_modules, .gitignore, composer.json, composer.lock, .DS_Store

## [1.1.0] - October 15, 2025 at 1:00 AM EST

### Added
- Organized asset structure with dedicated folders for better maintainability
- Separated CSS, JavaScript, and image assets into organized directories
- Improved theme file organization and structure

### Changed
- Moved all CSS to `/assets/css/style.css` for better organization
- Moved all JavaScript to `/assets/js/scripts.js` for better organization
- Moved all images to `/assets/images/` for better organization
- Updated all asset references to use new organized structure
- Restructured theme files for better development workflow

### Technical Details
- Created organized asset structure: `/assets/css/`, `/assets/js/`, `/assets/images/`
- Updated `functions.php` to reference new JavaScript location
- Updated all image references in templates to use new asset paths
- Moved main CSS content to assets folder while keeping theme header in root
- Improved file organization for better maintainability and development workflow
- Enhanced theme structure following WordPress best practices

## [1.0.9] - October 15, 2025 at 12:54 AM EST

### Fixed
- Improved required field asterisk styling in contact form
- Cleaned up redundant CSS rules for form labels
- Enhanced visual hierarchy for required field indicators

### Changed
- Updated form labels to use proper HTML structure for asterisks
- Simplified CSS styling approach for required field indicators
- Made required asterisks more visually prominent with brand color

### Technical Details
- Replaced inline asterisks with proper `<span class="required-asterisk">` elements
- Removed redundant CSS rules and simplified styling approach
- Required asterisks now use primary brand color for better visibility
- Cleaner HTML structure for better accessibility and styling control

## [1.0.8] - October 15, 2025 at 12:52 AM EST

### Added
- Enhanced contact form validation with real-time email validation
- Form field placeholders for better user experience
- Phone number pattern validation and formatting
- Improved form styling and visual feedback
- Client-side form validation before submission

### Changed
- Updated contact form fields with helpful placeholders
- Enhanced form validation with better error messaging
- Improved form styling for better visual hierarchy
- Added autofocus to name field for better UX

### Fixed
- Form validation styling and error message display
- Improved form accessibility and user guidance
- Enhanced form field formatting and constraints

### Technical Details
- Added comprehensive email validation with regex patterns
- Implemented phone number pattern validation (xxx) xxx-xxxx
- Added real-time form validation feedback
- Enhanced form styling with better error message display
- Improved form accessibility with proper placeholders and labels
- Added client-side validation before server-side processing

## [1.0.7] - October 15, 2025 at 12:43 AM EST

### Added
- Leads Custom Post Type (CPT) for lead management
- Contact form integration with Leads CPT
- Automatic lead creation from contact form submissions
- Clean footer layout without widget dependencies

### Changed
- Updated contact form to create Lead records instead of just sending emails
- Simplified footer structure to prevent unwanted widget content
- Improved lead data management and storage

### Fixed
- Removed awkward bullet points ("October 2025", "Uncategorized") from footer
- Cleaned up footer widget dependencies that were causing display issues

### Technical Details
- Added Leads CPT with proper post type registration
- Contact form submissions now create new Lead posts with form data
- Footer now uses static content instead of dynamic widgets
- Enhanced lead tracking and management capabilities
- Improved data collection and storage for business leads

## [1.0.6] - October 15, 2025 at 12:33 AM EST

### Added
- Hero section background image with brand color overlay
- Professional PNG icons for all service cards
- Service card hover effects with primary color outline
- Organized image assets in dedicated `/images` folder

### Changed
- Updated hero section to use `hero-banner-optimized.jpg` as background image
- Replaced emoji icons with custom PNG icons in service cards
- Removed green circular backgrounds from service icons
- Updated "Get Started" button styling for better visibility against hero background
- Moved all image assets to `/images` folder for better organization

### Fixed
- Removed CSS color filter that was distorting service icon colors
- Updated image paths to reflect new `/images` folder structure
- Improved button contrast in hero section

### Technical Details
- Hero section now uses `linear-gradient(rgba(226, 125, 61, 0.8), rgba(226, 125, 61, 0.8)), url('images/hero-banner-optimized.jpg')`
- Service icons: strategy.png, web-development.png, digital-marketing.png, data-analytics.png, creative.png, growth-consulting.png
- Added `.btn-hero-primary` class for white background button with brand color text
- Service cards now have 2px primary color outline on hover with smooth transitions
- All icons display in their original brand colors without CSS filters

## [1.0.5] - October 15, 2025 at 12:07 AM EST

### Added
- REST API healthcheck endpoint for monitoring and diagnostics
- Comprehensive system status reporting via API
- Database connectivity monitoring
- Server performance metrics tracking

### Technical Details
- Added `/wp-json/healthcheck/v1/ping` endpoint
- Returns WordPress version, theme info, database status, and server metrics
- Includes memory usage, PHP version, and maintenance mode detection
- Provides site URL, multisite status, and database prefix information
- REST API endpoint with public access for health monitoring

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
