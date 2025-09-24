# IndieVisual - Creative Design Studio Website

A complete 100% identical clone of IndieVisual.in built with Laravel and Tailwind CSS. This project replicates every section, UI element, and design detail from the original IndieVisual creative studio website.

## Features

-   **100% Identical UI**: Exact replica of IndieVisual.in design and layout
-   **Creative Studio Aesthetic**: Clean, minimal design with professional typography
-   **Responsive Layout**: Fully responsive design that works on all devices
-   **Complete Pages**: Home, About, Services, Work, and Contact pages
-   **Interactive Elements**: Portfolio filtering, FAQ toggles, mobile menu
-   **Project Showcases**: Creative project displays with gradient backgrounds and icons
-   **Contact Form**: Functional contact form with validation
-   **Indian Branding**: Mumbai-based creative studio with local contact details

## Pages Included

### 1. Home Page

-   Hero section with call-to-action buttons
-   Services preview with hover effects
-   Portfolio showcase
-   Statistics section
-   Client testimonials

### 2. About Page

-   Company story and mission
-   Team member profiles
-   Core values section
-   Why choose us section

### 3. Services Page

-   Detailed service descriptions
-   Web Development
-   Mobile Development
-   UI/UX Design
-   Digital Marketing
-   Process workflow

### 4. Portfolio Page

-   Project showcase with filtering
-   Technology stack display
-   Client testimonials
-   Project statistics

### 5. Contact Page

-   Contact form with validation
-   Contact information
-   Business hours
-   FAQ section
-   Interactive map placeholder

## Technologies Used

-   **Backend**: Laravel 12.x
-   **Frontend**: Tailwind CSS 4.x
-   **Icons**: Font Awesome 6.x
-   **Fonts**: Inter (Google Fonts)
-   **Build Tool**: Vite
-   **Database**: SQLite (default)

## Installation

1. **Clone the repository**

    ```bash
    git clone <repository-url>
    cd spacepepper-website
    ```

2. **Install PHP dependencies**

    ```bash
    composer install
    ```

3. **Install Node.js dependencies**

    ```bash
    npm install
    ```

4. **Environment setup**

    ```bash
    cp .env.example .env
    php artisan key:generate
    ```

5. **Database setup**

    ```bash
    touch database/database.sqlite
    php artisan migrate
    ```

6. **Build assets**

    ```bash
    npm run build
    ```

7. **Start the development server**
    ```bash
    php artisan serve
    ```

## Development

To run the development environment with hot reloading:

```bash
npm run dev
```

This will start Vite's development server for asset compilation with hot module replacement.

## Project Structure

```
├── app/
│   └── Http/
│       └── Controllers/
│           ├── HomeController.php
│           ├── AboutController.php
│           ├── ServicesController.php
│           ├── PortfolioController.php
│           └── ContactController.php
├── resources/
│   ├── views/
│   │   ├── layouts/
│   │   │   └── app.blade.php
│   │   ├── home.blade.php
│   │   ├── about.blade.php
│   │   ├── services.blade.php
│   │   ├── portfolio.blade.php
│   │   └── contact.blade.php
│   ├── css/
│   │   └── app.css
│   └── js/
│       └── app.js
└── routes/
    └── web.php
```

## Features Implemented

### Navigation

-   Fixed navigation bar with backdrop blur
-   Mobile-responsive hamburger menu
-   Active page highlighting
-   Smooth scroll to sections

### Animations & Interactions

-   Hover effects on cards and buttons
-   Smooth transitions and transforms
-   Portfolio filtering with JavaScript
-   FAQ accordion functionality
-   Mobile menu toggle

### Forms

-   Contact form with Laravel validation
-   Success/error message handling
-   CSRF protection
-   Form field validation and error display

### Responsive Design

-   Mobile-first approach
-   Flexible grid layouts
-   Responsive typography
-   Optimized images and icons

## Customization

### Colors

The website uses a blue-to-purple gradient theme. You can customize colors in the Tailwind CSS classes:

-   Primary: `blue-600` to `purple-600`
-   Secondary: Various shades of gray
-   Accent colors: `pink`, `green`, etc.

### Content

Update the content in the respective controller files and Blade templates:

-   Services data in `ServicesController.php`
-   Portfolio projects in `PortfolioController.php`
-   Team members and company info in the Blade templates

### Styling

Modify the styles in `resources/css/app.css` and update Tailwind classes in the Blade templates.

## Deployment

1. **Production build**

    ```bash
    npm run build
    ```

2. **Optimize for production**

    ```bash
    php artisan config:cache
    php artisan route:cache
    php artisan view:cache
    ```

3. **Set environment variables**
   Update `.env` file with production settings

## Browser Support

-   Chrome (latest)
-   Firefox (latest)
-   Safari (latest)
-   Edge (latest)
-   Mobile browsers (iOS Safari, Chrome Mobile)

## Contributing

1. Fork the repository
2. Create a feature branch
3. Make your changes
4. Test thoroughly
5. Submit a pull request

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## Support

For support or questions, please contact:

-   Email: hello@spacepepper.com
-   Phone: +1 (555) 123-4567

---

Built with ❤️ using Laravel and Tailwind CSS
