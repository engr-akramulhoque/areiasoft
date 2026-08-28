@php
    $pageTitle = 'Blog | Areia Soft';
@endphp

<x-guest-layout :title="$pageTitle">

    @push('styles')
        <style>
            .blog-page {
                padding: 120px 1.5rem 5rem;
                min-height: 100vh;
            }

            .blog-container {
                max-width: 1200px;
                margin: 0 auto;
            }

            .blog-hero {
                text-align: center;
                max-width: 850px;
                margin: 0 auto 4rem;
            }

            .blog-eyebrow {
                display: inline-flex;
                align-items: center;
                gap: .5rem;
                padding: .45rem 1rem;
                margin-bottom: 1.25rem;
                border: 1px solid var(--glass-border);
                border-radius: 50px;
                background: var(--cyan-subtle);
                color: var(--cyan);
                font-size: .8rem;
                font-weight: 700;
                letter-spacing: .08em;
                text-transform: uppercase;
            }

            .blog-eyebrow i {
                font-size: .75rem;
            }

            .blog-hero h1 {
                margin: 0 0 1.25rem;
                font-size: clamp(2.4rem, 5vw, 4.5rem);
                line-height: 1.05;
                letter-spacing: -.045em;
                font-weight: 800;
                color: var(--white);
            }

            .blog-hero h1 span {
                color: var(--cyan);
            }

            .blog-hero p {
                max-width: 700px;
                margin: 0 auto;
                color: var(--white-muted);
                font-size: 1.05rem;
                line-height: 1.8;
            }

            .blog-categories {
                display: flex;
                justify-content: center;
                flex-wrap: wrap;
                gap: .65rem;
                margin-bottom: 3rem;
            }

            .blog-category-link {
                display: inline-flex;
                align-items: center;
                gap: .5rem;
                padding: .65rem 1rem;
                border: 1px solid var(--glass-border);
                border-radius: 50px;
                background: var(--glass-bg);
                color: var(--white-muted);
                text-decoration: none;
                font-size: .85rem;
                font-weight: 600;
                transition: var(--transition);
            }

            .blog-category-link:hover,
            .blog-category-link.active {
                color: var(--cyan);
                border-color: var(--glass-border-hover);
                background: var(--cyan-subtle);
                transform: translateY(-2px);
                box-shadow: 0 8px 25px rgba(0, 229, 255, .08);
            }

            .category-count {
                min-width: 22px;
                height: 22px;
                display: inline-flex;
                align-items: center;
                justify-content: center;
                padding: 0 .35rem;
                border-radius: 50px;
                background: rgba(255, 255, 255, .06);
                color: var(--white-muted);
                font-size: .7rem;
            }

            .blog-category-link:hover .category-count,
            .blog-category-link.active .category-count {
                background: rgba(0, 229, 255, .12);
                color: var(--cyan);
            }

            .blog-grid {
                display: grid;
                grid-template-columns: repeat(3, minmax(0, 1fr));
                gap: 1.5rem;
            }

            .blog-card {
                display: flex;
                flex-direction: column;
                height: 100%;
                overflow: hidden;
                background: var(--card-bg);
                border: 1px solid var(--glass-border);
                border-radius: var(--radius-lg);
                backdrop-filter: blur(18px);
                -webkit-backdrop-filter: blur(18px);
                transition: var(--transition);
            }

            .blog-card:hover {
                transform: translateY(-8px);
                border-color: var(--glass-border-hover);
                box-shadow:
                    0 20px 50px rgba(0, 0, 0, .35),
                    0 0 30px rgba(0, 229, 255, .06);
            }

            .blog-card-image {
                position: relative;
                aspect-ratio: 16 / 9;
                overflow: hidden;
                background: linear-gradient(135deg,
                        rgba(0, 229, 255, .08),
                        rgba(13, 21, 32, .9));
            }

            .blog-card-image img {
                width: 100%;
                height: 100%;
                display: block;
                object-fit: cover;
                transition: transform .6s ease;
            }

            .blog-card:hover .blog-card-image img {
                transform: scale(1.05);
            }

            .blog-card-image::after {
                content: "";
                position: absolute;
                inset: 0;
                background: linear-gradient(to top,
                        rgba(10, 13, 20, .5),
                        transparent 50%);
                pointer-events: none;
            }

            .blog-category-badge {
                position: absolute;
                top: 1rem;
                left: 1rem;
                z-index: 2;
                display: inline-flex;
                align-items: center;
                padding: .4rem .75rem;
                border: 1px solid rgba(255, 255, 255, .12);
                border-radius: 50px;
                background: rgba(10, 13, 20, .82);
                backdrop-filter: blur(12px);
                -webkit-backdrop-filter: blur(12px);
                color: var(--cyan);
                font-size: .72rem;
                font-weight: 700;
            }

            .blog-card-body {
                display: flex;
                flex: 1;
                flex-direction: column;
                padding: 1.5rem;
            }

            .blog-card-meta {
                display: flex;
                align-items: center;
                flex-wrap: wrap;
                gap: .75rem;
                margin-bottom: .8rem;
                color: var(--white-muted);
                font-size: .72rem;
            }

            .blog-card-meta span {
                display: inline-flex;
                align-items: center;
                gap: .35rem;
            }

            .blog-card-meta i {
                color: var(--cyan);
                font-size: .7rem;
            }

            .blog-card-title {
                margin: 0 0 .8rem;
                font-size: 1.2rem;
                line-height: 1.35;
                font-weight: 700;
                letter-spacing: -.02em;
            }

            .blog-card-title a {
                color: var(--white);
                text-decoration: none;
                transition: color .25s ease;
            }

            .blog-card-title a:hover {
                color: var(--cyan);
            }

            .blog-card-excerpt {
                margin: 0 0 1.25rem;
                color: var(--white-muted);
                font-size: .88rem;
                line-height: 1.75;
                display: -webkit-box;
                -webkit-line-clamp: 3;
                -webkit-box-orient: vertical;
                overflow: hidden;
            }

            .blog-card-footer {
                margin-top: auto;
                padding-top: 1rem;
                border-top: 1px solid var(--glass-border);
            }

            .blog-read-more {
                display: inline-flex;
                align-items: center;
                gap: .5rem;
                color: var(--cyan);
                text-decoration: none;
                font-size: .82rem;
                font-weight: 700;
                transition: var(--transition);
            }

            .blog-read-more i {
                transition: transform .25s ease;
            }

            .blog-read-more:hover {
                color: var(--white);
            }

            .blog-read-more:hover i {
                transform: translateX(4px);
            }

            .blog-empty {
                padding: 4rem 2rem;
                text-align: center;
                border: 1px solid var(--glass-border);
                border-radius: var(--radius-lg);
                background: var(--card-bg);
            }

            .blog-empty-icon {
                width: 70px;
                height: 70px;
                margin: 0 auto 1.25rem;
                display: flex;
                align-items: center;
                justify-content: center;
                border: 1px solid var(--glass-border);
                border-radius: 50%;
                background: var(--cyan-subtle);
                color: var(--cyan);
                font-size: 1.5rem;
            }

            .blog-empty h2 {
                margin-bottom: .5rem;
                font-size: 1.3rem;
                color: var(--white);
            }

            .blog-empty p {
                margin: 0;
                color: var(--white-muted);
            }

            .blog-pagination {
                width: 100%;
                margin-top: 3.5rem;
                display: flex;
                justify-content: center;
            }

            .blog-pagination nav {
                width: 100%;
                display: flex;
                justify-content: center;
            }

            .blog-pagination .pagination {
                display: flex;
                align-items: center;
                justify-content: center;
                flex-wrap: wrap;
                gap: .5rem;
                margin: 0;
                padding: 0;
            }

            .blog-pagination .page-item {
                margin: 0;
            }

            .blog-pagination .page-link {
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
                line-height: 1;
                text-decoration: none;
                box-shadow: none !important;
                backdrop-filter: blur(12px);
                -webkit-backdrop-filter: blur(12px);
                transition:
                    color .25s ease,
                    background .25s ease,
                    border-color .25s ease,
                    transform .25s ease,
                    box-shadow .25s ease;
            }

            .blog-pagination .page-link:hover {
                color: var(--cyan) !important;
                background: var(--cyan-subtle) !important;
                border-color: var(--glass-border-hover) !important;
                transform: translateY(-2px);
                box-shadow: 0 8px 25px rgba(0, 229, 255, .08) !important;
            }

            .blog-pagination .page-item.active .page-link {
                color: var(--bg-deep) !important;
                background: var(--cyan) !important;
                border-color: var(--cyan) !important;
                font-weight: 800;
                box-shadow: 0 8px 25px rgba(0, 229, 255, .18) !important;
            }

            .blog-pagination .page-item.disabled .page-link {
                color: rgba(255, 255, 255, .25) !important;
                background: rgba(255, 255, 255, .02) !important;
                border-color: rgba(255, 255, 255, .05) !important;
                cursor: not-allowed;
                transform: none;
                box-shadow: none !important;
            }

            .blog-pagination .page-link:focus {
                color: var(--cyan) !important;
                background: var(--cyan-subtle) !important;
                border-color: var(--glass-border-hover) !important;
                box-shadow: 0 0 0 3px rgba(0, 229, 255, .08) !important;
                outline: none;
            }

            .blog-pagination .page-link svg {
                width: 16px;
                height: 16px;
            }

            .blog-pagination .page-item:first-child .page-link,
            .blog-pagination .page-item:last-child .page-link {
                padding: 0 1rem;
            }

            @media (max-width: 991px) {
                .blog-grid {
                    grid-template-columns: repeat(2, minmax(0, 1fr));
                }

                .blog-hero {
                    margin-bottom: 3rem;
                }
            }

            @media (max-width: 768px) {
                .blog-page {
                    padding: 100px 1.25rem 4rem;
                }

                .blog-hero h1 {
                    font-size: clamp(2.2rem, 10vw, 3.2rem);
                }

                .blog-hero p {
                    font-size: .95rem;
                }

                .blog-categories {
                    justify-content: flex-start;
                    overflow-x: auto;
                    flex-wrap: nowrap;
                    padding-bottom: .5rem;
                    margin-bottom: 2.25rem;
                    scrollbar-width: none;
                }

                .blog-categories::-webkit-scrollbar {
                    display: none;
                }

                .blog-category-link {
                    flex: 0 0 auto;
                }
            }

            @media (max-width: 576px) {
                .blog-page {
                    padding: 95px 1rem 3rem;
                }

                .blog-grid {
                    grid-template-columns: 1fr;
                    gap: 1.25rem;
                }

                .blog-card-body {
                    padding: 1.25rem;
                }

                .blog-card-title {
                    font-size: 1.1rem;
                }

                .blog-pagination {
                    margin-top: 2.5rem;
                }

                .blog-pagination .pagination {
                    gap: .35rem;
                }

                .blog-pagination .page-link {
                    min-width: 38px;
                    height: 38px;
                    padding: 0 .65rem;
                    border-radius: 10px !important;
                    font-size: .75rem;
                }

                .blog-pagination .page-item:first-child .page-link,
                .blog-pagination .page-item:last-child .page-link {
                    padding: 0 .7rem;
                }

                .blog-pagination .page-link svg {
                    width: 14px;
                    height: 14px;
                }
            }
        </style>
    @endpush

    <main class="blog-page">
        <div class="blog-container">

            <header class="blog-hero">
                <div class="blog-eyebrow">
                    <i class="fa-solid fa-layer-group"></i>
                    Areia Soft Blog
                </div>

                <h1>
                    Insights for <span>Modern Technology</span>
                </h1>

                <p>
                    Explore practical insights, development guides and technology
                    ideas from Areia Soft. Learn about Laravel, web development,
                    software engineering, mobile applications and emerging technology.
                </p>
            </header>

            @if ($categories->count())
                <nav class="blog-categories" aria-label="Blog categories">

                    <a href="{{ route('blog.index') }}"
                        class="blog-category-link {{ request()->routeIs('blog.index') ? 'active' : '' }}">
                        <i class="fa-solid fa-grid-2"></i>
                        All Posts
                        <span class="category-count">{{ $posts->total() }}</span>
                    </a>

                    @foreach ($categories as $category)
                        <a href="{{ route('blog.category', $category->slug) }}"
                            class="blog-category-link {{ request()->route('slug') === $category->slug ? 'active' : '' }}">
                            {{ $category->name }}
                            <span class="category-count">{{ $category->posts_count }}</span>
                        </a>
                    @endforeach

                </nav>
            @endif

            @if ($posts->count())

                <section class="blog-grid" aria-label="Latest blog posts">

                    @foreach ($posts as $post)
                        <article class="blog-card">

                            <div class="blog-card-image">

                                @if ($post->featured_image)
                                    <img src="{{ asset('storage/' . $post->featured_image) }}" alt="{{ $post->title }}"
                                        loading="lazy" width="1200" height="675">
                                @else
                                    <div
                                        style="width:100%;height:100%;display:flex;align-items:center;justify-content:center;color:var(--cyan);font-size:2rem;">
                                        <i class="fa-solid fa-newspaper"></i>
                                    </div>
                                @endif

                                <span class="blog-category-badge">
                                    {{ $post->category->name }}
                                </span>

                            </div>

                            <div class="blog-card-body">

                                <div class="blog-card-meta">

                                    <span>
                                        <i class="fa-regular fa-calendar"></i>
                                        {{ $post->published_at?->format('M d, Y') }}
                                    </span>

                                    <span>
                                        <i class="fa-regular fa-clock"></i>
                                        {{ max(1, ceil(str_word_count(strip_tags($post->content)) / 200)) }}
                                        min read
                                    </span>

                                </div>

                                <h2 class="blog-card-title">
                                    <a href="{{ route('blog.show', $post->slug) }}">
                                        {{ $post->title }}
                                    </a>
                                </h2>

                                <p class="blog-card-excerpt">
                                    {{ $post->excerpt ?: \Illuminate\Support\Str::limit(strip_tags($post->content), 150) }}
                                </p>

                                <div class="blog-card-footer">

                                    <a href="{{ route('blog.show', $post->slug) }}" class="blog-read-more"
                                        aria-label="Read {{ $post->title }}">

                                        Read Article
                                        <i class="fa-solid fa-arrow-right"></i>

                                    </a>

                                </div>

                            </div>

                        </article>
                    @endforeach

                </section>

                @if ($posts->hasPages())
                    <div class="blog-pagination">
                        {{ $posts->onEachSide(1)->links() }}
                    </div>
                @endif
            @else
                <section class="blog-empty">

                    <div class="blog-empty-icon">
                        <i class="fa-regular fa-newspaper"></i>
                    </div>

                    <h2>No blog posts found</h2>

                    <p>
                        We are preparing new articles. Please check back soon.
                    </p>

                </section>

            @endif

        </div>
    </main>

</x-guest-layout>
