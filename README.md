# Testing setup of basic Old School style theme

Ongoing, with additions as time goes on.

- Modular
- Basic

To eventually updated to modern style template.

## Essential Theme Files

- style.css: The main stylesheet required for every theme. It defines the visual appearance (fonts, colors) and contains the theme header information.
- index.php: The primary template file required for all themes. It acts as the default if more specific files are missing.
- functions.php: Defines theme features, adds support for menus/widgets, and enqueues CSS/JS files.
- header.php: Contains the opening HTML tags and the header section, typically called using get_header().
- footer.php: Contains the closing HTML tags and footer content, called with get_footer().
- sidebar.php: Contains widgetized content areas, called with get_sidebar().
- screenshot.png: The image displayed in the theme selection screen.

## Other Common Components

- singular.php/single.php: Manages individual posts or pages.
- comments.php: Controls the layout of comments.

## Key Concepts

- Template Hierarchy: WordPress uses a strict hierarchy to decide which file to use to display content (e.g., searching for single.php before falling back to index.php).
- Template Tags: PHP functions like <?php get_header(); ?> that pull in different sections of the theme.
- Theme Structure: Themes can use CSS for styling and JavaScript for interactivity to break up page structure.

## Notes:

🧪 Only for testing.

🔧 Code is offered "as is".

## 📝 License

GNU General Public License v2 or later
