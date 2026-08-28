<x-guest-layout :title="$category->name . ' Blog | Areia Soft'">

    @push('styles')
        <style>
            .blog-category-page {
                padding: 120px 1.5rem 5rem;
                min-height: 100vh;
            }

            .blog-category-container {
                max-width: 1200px;
                margin: 0 auto;
            }

            .category-hero {
                position: relative;
                overflow: hidden;
                margin-bottom: 3rem;
                padding: 3.5rem;
                border: 1px solid var(--glass-border);
                border-radius: 28px;
                background: linear-gradient(135deg, rgba(0, 229, 255, .08), rgba(255, 255, 255, .025));
                backdrop-filter: blur(18px);
                -webkit-backdrop-filter: blur(18px);
            }

            .category-hero::before {
                content: "";
                position: absolute;
                width: 260px;
                height: 260px;
                top: -140px;
                right: -80px;
                border-radius: 50%;
                background: rgba(0, 229, 255, .08);
                filter: blur(20px);
            }

            .category-breadcrumb {
                position: relative;
                display: flex;
                align-items: center;
                gap: .6rem;
                margin-bottom: 1.5rem;
                color: var(--white-muted);
                font-size: .78rem;
            }

            .category-breadcrumb a {
                color: var(--white-muted);
                text-decoration: none;
                transition: color .25s ease;
            }

            .category-breadcrumb a:hover {
                color: var(--cyan);
            }

            .category-breadcrumb i {
                color: var(--cyan);
                font-size: .65rem;
            }

            .category-label {
                position: relative;
                display: inline-flex;
                align-items: center;
                gap: .5rem;
                margin-bottom: 1rem;
                padding: .45rem .85rem;
                border: 1px solid rgba(0, 229, 255, .18);
                border-radius: 50px;
                background: rgba(0, 229, 255, .07);
                color: var(--cyan);
                font-size: .72rem;
                font-weight: 700;
                letter-spacing: .08em;
                text-transform: uppercase;
            }

            .category-hero h1 {
                position: relative;
                margin: 0 0 1rem;
                max-width: 850px;
                color: var(--white);
                font-size: clamp(2.2rem, 5vw, 4rem);
                line-height: 1.05;
                letter-spacing: -.045em;
                font-weight: 800;
            }

            .category-hero h1 span {
                color: var(--cyan);
            }

            .category-description {
                position: relative;
                max-width: 760px;
                margin: 0;
                color: var(--white-muted);
                font-size: 1rem;
                line-height: 1.8;
            }

            .category-meta {
                position: relative;
                display: flex;
                align-items: center;
                flex-wrap: wrap;
                gap: .75rem;
                margin-top: 1.75rem;
            }

            .category-meta-item {
                display: inline-flex;
                align-items: center;
                gap: .45rem;
                padding: .55rem .8rem;
                border: 1px solid var(--glass-border);
                border-radius: 10px;
                background: rgba(255, 255, 255, .025);
                color: var(--white-muted);
                font-size: .75rem;
                font-weight: 600;
            }

            .category-meta-item i {
                color: var(--cyan);
            }

            .category-layout {
                display: grid;
                grid-template-columns: minmax(0, 1fr) 280px;
                gap: 2rem;
                align-items: start;
            }

            .category-main {
                min-width: 0;
            }

            .category-section-header {
                display: flex;
                align-items: center;
                justify-content: space-between;
                gap: 1rem;
                margin-bottom: 1.5rem;
            }

            .category-section-title {
                margin: 0;
                color: var(--white);
                font-size: 1.3rem;
                font-weight: 750;
                letter-spacing: -.02em;
            }

            .category-section-title span {
                color: var(--cyan);
            }

            .category-result-count {
                color: var(--white-muted);
                font-size: .75rem;
            }

            .category-post-grid {
                display: grid;
                grid-template-columns: repeat(2, minmax(0, 1fr));
                gap: 1.5rem;
            }

            .category-post-card {
                display: flex;
                flex-direction: column;
                height: 100%;
                overflow: hidden;
                border: 1px solid var(--glass-border);
                border-radius: var(--radius-lg);
                background: var(--card-bg);
                backdrop-filter: blur(18px);
                -webkit-backdrop-filter: blur(18px);
                transition: var(--transition);
            }

            .category-post-card:hover {
                transform: translateY(-7px);
                border-color: var(--glass-border-hover);
                box-shadow: 0 20px 50px rgba(0, 0, 0, .35), 0 0 30px rgba(0, 229, 255, .06);
            }

            .category-post-image {
                position: relative;
                overflow: hidden;
                aspect-ratio: 16 / 9;
                background: linear-gradient(135deg, rgba(0, 229, 255, .08), rgba(13, 21, 32, .9));
            }

            .category-post-image img {
                display: block;
                width: 100%;
                height: 100%;
                object-fit: cover;
                transition: transform .6s ease;
            }

            .category-post-card:hover .category-post-image img {
                transform: scale(1.05);
            }

            .category-post-image::after {
                content: "";
                position: absolute;
                inset: 0;
                background: linear-gradient(to top, rgba(10, 13, 20, .5), transparent 55%);
                pointer-events: none;
            }

            .post-date-badge {
                position: absolute;
                z-index: 2;
                top: 1rem;
                left: 1rem;
                display: inline-flex;
                align-items: center;
                gap: .4rem;
                padding: .4rem .7rem;
                border: 1px solid rgba(255, 255, 255, .12);
                border-radius: 50px;
                background: rgba(10, 13, 20, .82);
                color: var(--white);
                font-size: .68rem;
                font-weight: 600;
                backdrop-filter: blur(12px);
                -webkit-backdrop-filter: blur(12px);
            }

            .post-date-badge i {
                color: var(--cyan);
            }

            .category-post-body {
                display: flex;
                flex: 1;
                flex-direction: column;
                padding: 1.4rem;
            }

            .category-post-meta {
                display: flex;
                align-items: center;
                gap: .8rem;
                margin-bottom: .75rem;
                color: var(--white-muted);
                font-size: .7rem;
            }

            .category-post-meta span {
                display: inline-flex;
                align-items: center;
                gap: .35rem;
            }

            .category-post-meta i {
                color: var(--cyan);
            }

            .category-post-title {
                margin: 0 0 .75rem;
                font-size: 1.12rem;
                line-height: 1.4;
                font-weight: 700;
                letter-spacing: -.02em;
            }

            .category-post-title a {
                color: var(--white);
                text-decoration: none;
                transition: color .25s ease;
            }

            .category-post-title a:hover {
                color: var(--cyan);
            }

            .category-post-excerpt {
                display: -webkit-box;
                overflow: hidden;
                margin: 0 0 1.25rem;
                color: var(--white-muted);
                font-size: .84rem;
                line-height: 1.7;
                -webkit-line-clamp: 3;
                -webkit-box-orient: vertical;
            }

            .category-post-footer {
                margin-top: auto;
                padding-top: 1rem;
                border-top: 1px solid var(--glass-border);
            }

            .category-read-more {
                display: inline-flex;
                align-items: center;
                gap: .5rem;
                color: var(--cyan);
                text-decoration: none;
                font-size: .78rem;
                font-weight: 700;
                transition: var(--transition);
            }

            .category-read-more i {
                transition: transform .25s ease;
            }

            .category-read-more:hover {
                color: var(--white);
            }

            .category-read-more:hover i {
                transform: translateX(4px);
            }

            .category-sidebar {
                position: sticky;
                top: 100px;
            }

            .sidebar-card {
                padding: 1.4rem;
                border: 1px solid var(--glass-border);
                border-radius: var(--radius-lg);
                background: var(--card-bg);
                backdrop-filter: blur(18px);
                -webkit-backdrop-filter: blur(18px);
            }

            .sidebar-card+.sidebar-card {
                margin-top: 1.25rem;
            }

            .sidebar-title {
                display: flex;
                align-items: center;
                gap: .55rem;
                margin: 0 0 1rem;
                padding-bottom: .85rem;
                border-bottom: 1px solid var(--glass-border);
                color: var(--white);
                font-size: .95rem;
                font-weight: 700;
            }

            .sidebar-title i {
                color: var(--cyan);
            }

            .sidebar-category-list {
                display: flex;
                flex-direction: column;
                gap: .35rem;
                margin: 0;
                padding: 0;
                list-style: none;
            }

            .sidebar-category-link {
                display: flex;
                align-items: center;
                justify-content: space-between;
                gap: .75rem;
                padding: .7rem .75rem;
                border: 1px solid transparent;
                border-radius: 10px;
                color: var(--white-muted);
                text-decoration: none;
                font-size: .78rem;
                font-weight: 600;
                transition: var(--transition);
            }

            .sidebar-category-link:hover,
            .sidebar-category-link.active {
                color: var(--cyan);
                border-color: var(--glass-border);
                background: var(--cyan-subtle);
                transform: translateX(3px);
            }

            .sidebar-category-count {
                min-width: 24px;
                height: 24px;
                display: inline-flex;
                align-items: center;
                justify-content: center;
                border-radius: 50%;
                background: rgba(255, 255, 255, .05);
                color: var(--white-muted);
                font-size: .65rem;
            }

            .sidebar-category-link.active .sidebar-category-count,
            .sidebar-category-link:hover .sidebar-category-count {
                background: rgba(0, 229, 255, .12);
                color: var(--cyan);
            }

            .sidebar-back-link {
                display: flex;
                align-items: center;
                justify-content: center;
                gap: .5rem;
                width: 100%;
                padding: .75rem 1rem;
                border: 1px solid var(--glass-border);
                border-radius: 10px;
                background: rgba(255, 255, 255, .025);
                color: var(--white-muted);
                text-decoration: none;
                font-size: .78rem;
                font-weight: 700;
                transition: var(--transition);
            }

            .sidebar-back-link:hover {
                color: var(--cyan);
                border-color: var(--glass-border-hover);
                background: var(--cyan-subtle);
            }

            .category-empty {
                padding: 4rem 2rem;
                text-align: center;
                border: 1px solid var(--glass-border);
                border-radius: var(--radius-lg);
                background: var(--card-bg);
            }

            .category-empty-icon {
                width: 68px;
                height: 68px;
                display: flex;
                align-items: center;
                justify-content: center;
                margin: 0 auto 1.2rem;
                border: 1px solid var(--glass-border);
                border-radius: 50%;
                background: var(--cyan-subtle);
                color: var(--cyan);
                font-size: 1.4rem;
            }

            .category-empty h2 {
                margin: 0 0 .5rem;
                color: var(--white);
                font-size: 1.2rem;
            }

            .category-empty p {
                margin: 0;
                color: var(--white-muted);
                font-size: .85rem;
            }

            .category-pagination {
                width: 100%;
                display: flex;
                justify-content: center;
                align-items: center;
                margin-top: 3rem;
            }

            .category-pagination nav {
                display: flex;
                justify-content: center;
                width: 100%;
            }

            .category-pagination nav>div:first-child {
                display: flex;
                align-items: center;
                justify-content: center;
                width: 100%;
            }

            .category-pagination nav>div:first-child>div:first-child {
                display: none !important;
            }

            .category-pagination .pagination {
                display: flex;
                align-items: center;
                justify-content: center;
                flex-wrap: wrap;
                gap: .5rem;
                margin: 0;
                padding: 0;
                list-style: none;
            }

            .category-pagination .page-item {
                margin: 0;
            }

            .category-pagination .page-link {
                min-width: 42px;
                height: 42px;
                display: inline-flex;
                align-items: center;
                justify-content: center;
                padding: 0 .85rem;
                border: 1px solid var(--glass-border) !important;
                border-radius: 12px !important;
                background: rgba(255, 255, 255, .035) !important;
                color: var(--white-muted) !important;
                font-size: .82rem;
                font-weight: 600;
                text-decoration: none;
                box-shadow: none !important;
                transition: var(--transition);
                backdrop-filter: blur(12px);
                -webkit-backdrop-filter: blur(12px);
            }

            .category-pagination .page-link:hover {
                color: var(--cyan) !important;
                border-color: var(--glass-border-hover) !important;
                background: var(--cyan-subtle) !important;
                transform: translateY(-2px);
                box-shadow: 0 8px 25px rgba(0, 229, 255, .08) !important;
            }

            .category-pagination .page-item.active .page-link {
                color: var(--bg-deep) !important;
                background: var(--cyan) !important;
                border-color: var(--cyan) !important;
                font-weight: 800;
                box-shadow: 0 8px 25px rgba(0, 229, 255, .18) !important;
            }

            .category-pagination .page-item.disabled .page-link {
                color: rgba(255, 255, 255, .25) !important;
                background: rgba(255, 255, 255, .02) !important;
                border-color: rgba(255, 255, 255, .05) !important;
                cursor: not-allowed;
                transform: none;
            }

            .category-pagination .page-link svg {
                width: 16px;
                height: 16px;
                fill: none;
                stroke: currentColor;
            }

            @media (max-width: 991px) {
                .category-layout {
                    grid-template-columns: 1fr;
                }

                .category-sidebar {
                    position: static;
                    display: grid;
                    grid-template-columns: repeat(2, minmax(0, 1fr));
                    gap: 1.25rem;
                }

                .sidebar-card+.sidebar-card {
                    margin-top: 0;
                }
            }

            @media (max-width: 768px) {
                .blog-category-page {
                    padding: 100px 1.25rem 4rem;
                }

                .category-hero {
                    padding: 2.25rem 1.5rem;
                    margin-bottom: 2.25rem;
                }

                .category-hero h1 {
                    font-size: clamp(2.1rem, 9vw, 3.2rem);
                }

                .category-post-grid {
                    grid-template-columns: 1fr;
                }

                .category-sidebar {
                    grid-template-columns: 1fr;
                }
            }

            @media (max-width: 576px) {
                .blog-category-page {
                    padding: 95px 1rem 3rem;
                }

                .category-hero {
                    padding: 2rem 1.25rem;
                    border-radius: 22px;
                }

                .category-hero h1 {
                    font-size: 2.2rem;
                }

                .category-description {
                    font-size: .9rem;
                }

                .category-section-header {
                    align-items: flex-start;
                    flex-direction: column;
                }

                .category-pagination {
                    margin-top: 2.5rem;
                }

                .category-pagination .pagination {
                    gap: .35rem;
                }

                .category-pagination .page-link {
                    min-width: 38px;
                    height: 38px;
                    padding: 0 .7rem;
                    border-radius: 10px !important;
                    font-size: .75rem;
                }

                .category-pagination .page-link svg {
                    width: 14px;
                    height: 14px;
                }
            }
        </style>
    @endpush

    <main class="blog-category-page">
        <div class="blog-category-container">

            <header class="category-hero">
                <div class="category-breadcrumb">
                    <a href="{{ route('blog.index') }}">Blog</a>
                    <i class="fa-solid fa-chevron-right"></i>
                    <span>{{ $category->name }}</span>
                </div>

                <div class="category-label">
                    <i class="fa-solid fa-folder-open"></i>
                    Blog Category
                </div>

                <h1>
                    {{ $category->name }}
                    <span>Insights</span>
                </h1>

                <p class="category-description">
                    {{ $category->description ?: 'Explore our latest insights, practical guides and expert perspectives on ' . strtolower($category->name) . '.' }}
                </p>

                <div class="category-meta">
                    <div class="category-meta-item">
                        <i class="fa-regular fa-newspaper"></i>
                        {{ $posts->total() }} {{ Str::plural('Article', $posts->total()) }}
                    </div>

                    <div class="category-meta-item">
                        <i class="fa-solid fa-layer-group"></i>
                        {{ $category->name }}
                    </div>
                </div>
            </header>

            <div class="category-layout">
                <section class="category-main">
                    <div class="category-section-header">
                        <h2 class="category-section-title">
                            Latest <span>Articles</span>
                        </h2>

                        <span class="category-result-count">
                            Showing {{ $posts->firstItem() ?? 0 }}
                            to {{ $posts->lastItem() ?? 0 }}
                            of {{ $posts->total() }}
                        </span>
                    </div>

                    @if ($posts->count())
                        <div class="category-post-grid">
                            @foreach ($posts as $post)
                                <article class="category-post-card">
                                    <div class="category-post-image">
                                        @if ($post->featured_image)
                                            <img src="{{ asset('storage/' . $post->featured_image) }}"
                                                alt="{{ $post->title }}" loading="lazy" width="1200" height="675">
                                        @else
                                            <div
                                                style="width:100%;height:100%;display:flex;align-items:center;justify-content:center;color:var(--cyan);font-size:2rem;">
                                                <i class="fa-solid fa-newspaper"></i>
                                            </div>
                                        @endif

                                        <span class="post-date-badge">
                                            <i class="fa-regular fa-calendar"></i>
                                            {{ $post->published_at?->format('M d, Y') }}
                                        </span>
                                    </div>

                                    <div class="category-post-body">
                                        <div class="category-post-meta">
                                            <span>
                                                <i class="fa-regular fa-clock"></i>
                                                {{ max(1, ceil(str_word_count(strip_tags($post->content)) / 200)) }}
                                                min read
                                            </span>

                                            <span>
                                                <i class="fa-solid fa-folder"></i>
                                                {{ $category->name }}
                                            </span>
                                        </div>

                                        <h3 class="category-post-title">
                                            <a href="{{ route('blog.show', $post->slug) }}">
                                                {{ $post->title }}
                                            </a>
                                        </h3>

                                        <p class="category-post-excerpt">
                                            {{ $post->excerpt ?: Str::limit(strip_tags($post->content), 150) }}
                                        </p>

                                        <div class="category-post-footer">
                                            <a href="{{ route('blog.show', $post->slug) }}" class="category-read-more"
                                                aria-label="Read {{ $post->title }}">
                                                Read Article
                                                <i class="fa-solid fa-arrow-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                </article>
                            @endforeach
                        </div>

                        @if ($posts->hasPages())
                            <div class="category-pagination">
                                {{ $posts->onEachSide(1)->links() }}
                            </div>
                        @endif
                    @else
                        <div class="category-empty">
                            <div class="category-empty-icon">
                                <i class="fa-regular fa-newspaper"></i>
                            </div>

                            <h2>No articles in this category</h2>

                            <p>
                                We are preparing new articles for this category. Please check back soon.
                            </p>
                        </div>
                    @endif
                </section>

                <aside class="category-sidebar">
                    <div class="sidebar-card">
                        <h3 class="sidebar-title">
                            <i class="fa-solid fa-folder-tree"></i>
                            Blog Categories
                        </h3>

                        <ul class="sidebar-category-list">
                            @foreach ($categories as $item)
                                <li>
                                    <a href="{{ route('blog.category', $item->slug) }}"
                                        class="sidebar-category-link {{ $item->id === $category->id ? 'active' : '' }}">
                                        <span>{{ $item->name }}</span>
                                        <span class="sidebar-category-count">
                                            {{ $item->posts_count }}
                                        </span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="sidebar-card">
                        <a href="{{ route('blog.index') }}" class="sidebar-back-link">
                            <i class="fa-solid fa-arrow-left"></i>
                            View All Articles
                        </a>
                    </div>
                </aside>
            </div>
        </div>
    </main>

</x-guest-layout>
