# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Overview

This is the source code for the Filament PHP website (https://filamentphp.com), built using Laravel as the main framework. The project combines a Laravel backend with Vite for frontend asset building and includes a separate Astro-based documentation site.

## Architecture

### Main Application (Laravel)
- **Framework**: Laravel 10 with PHP 8.1+
- **Content Management**: Uses Orbit package for content management with Markdown files stored in `/content/`
- **Content Types**:
  - Articles (`content/articles/`) - Community-contributed content
  - Plugins (`content/plugins/`) - Plugin listings with metadata
  - Authors (`content/authors/`) - Author profiles linked to content
  - Categories for both articles and plugins
- **Database**: Uses Laravel models for Stars, Users, and relationships between content
- **External Integrations**:
  - Anystack.sh for plugin sales
  - Packagist API for download stats
  - GitHub API for repository stats

### Documentation Site (Astro)
- Located in `/docs/` directory
- Separate Node.js-based Astro application
- Builds static documentation from Filament package repositories
- Uses its own package.json and build system

### Content Structure
- **Articles**: Markdown files with frontmatter in `content/articles/`
- **Plugins**: Markdown files in `content/plugins/` with metadata like author, categories, GitHub repo, docs URLs
- **Authors**: Profile data in `content/authors/` with corresponding avatars in `content/authors/avatars/`
- **Plugin Images**: Screenshots in `content/plugins/images/` (16:9 aspect ratio, 2560x1440px minimum)

## Development Commands

### Main Application
- **Development server**: `npm run dev` (Vite development server)
- **Build assets**: `npm run build`
- **Code formatting**: `npm run prettier`
- **PHP linting**: `composer run pint` or `./vendor/bin/pint`
- **PHP static analysis**: `composer run test` (runs PHPStan)
- **Combined code style**: `composer run cs` (runs both Pint and Prettier)

### Documentation Site
- **Build docs**: `npm run build:docs` (builds the Astro documentation)
- **Dev docs for 4.x**: `npm run dev:4.x-docs`

### Laravel/Filament Specific
- **Clear Orbit cache**: `php artisan clear-orbit-cache` (clears content cache)
- **Optimize images**: `php artisan optimize-images` (requires image optimization tools)
- **Fetch remote data**: `php artisan fetch-remote-data` (updates plugin stats from external sources)

## Key Directories

- `app/` - Laravel application code
  - `Models/` - Article, Plugin, Author, Star models
  - `Http/Controllers/` - Controllers for articles, plugins, and API endpoints
  - `Actions/` - Business logic for plugin data fetching and starring
  - `Console/Commands/` - Artisan commands for maintenance tasks
- `content/` - Markdown content files (articles, plugins, authors)
- `docs/` - Astro documentation site
- `resources/` - Laravel views, CSS, JS, and images
- `routes/web.php` - Web routes including docs routing logic

## Special Considerations

### Content Management
- Content is managed through Markdown files, not a traditional CMS
- Changes to content require clearing the Orbit cache: `php artisan clear-orbit-cache`
- Plugin submissions follow strict quality guidelines (see README.md)

### Deployment
- Uses Laravel Forge deployment
- Requires NGINX configuration for docs routing (see README.md)
- Image optimization tools must be installed for `optimize-images` command

### Documentation
- Documentation content is pulled from external Filament package repositories
- The docs site uses a preservation system (`docs/preserved-dist/`) for serving static files
- Version-specific routing handles different Filament versions (1.x - 4.x)

### Plugin Ecosystem
- Plugins can be free or paid (through Anystack.sh integration)
- Plugin listings include download stats, GitHub stars, and community ratings
- 15% commission on plugin sales supports Filament development

## Testing & Quality

- PHPStan for static analysis (`composer run test`)
- Laravel Pint for code styling (`composer run pint`)
- Prettier for frontend formatting (`npm run prettier`)
- Combined style check: `composer run cs`