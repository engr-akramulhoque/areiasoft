@php
    $pageTitle = $post->meta_title ?: $post->title . ' | Areia Soft';
    $commentCount = $post->approvedComments->count();
@endphp

<x-guest-layout :title="$pageTitle">

    @push('styles')
        <style>
            .blog-show-page {
                padding: 120px 1.5rem 6rem;
                min-height: 100vh;
            }

            .blog-show-container {
                max-width: 1180px;
                margin: 0 auto;
            }

            .blog-breadcrumb {
                display: flex;
                align-items: center;
                flex-wrap: wrap;
                gap: .55rem;
                margin-bottom: 2.5rem;
                color: var(--white-muted);
                font-size: .78rem;
            }

            .blog-breadcrumb a {
                color: var(--white-muted);
                text-decoration: none;
                transition: color .25s ease;
            }

            .blog-breadcrumb a:hover {
                color: var(--cyan);
            }

            .blog-breadcrumb i {
                color: var(--cyan);
                font-size: .65rem;
            }

            .blog-breadcrumb-current {
                color: var(--white);
                max-width: 420px;
                overflow: hidden;
                text-overflow: ellipsis;
                white-space: nowrap;
            }

            .article-header {
                max-width: 920px;
                margin: 0 auto 3rem;
                text-align: center;
            }

            .article-category {
                display: inline-flex;
                align-items: center;
                gap: .45rem;
                padding: .45rem .85rem;
                margin-bottom: 1.35rem;
                border: 1px solid var(--glass-border);
                border-radius: 50px;
                background: var(--cyan-subtle);
                color: var(--cyan);
                font-size: .73rem;
                font-weight: 700;
                text-transform: uppercase;
                letter-spacing: .06em;
                text-decoration: none;
            }

            .article-category:hover {
                color: var(--cyan);
                border-color: var(--glass-border-hover);
            }

            .article-title {
                margin: 0;
                color: var(--white);
                font-size: clamp(2.3rem, 5vw, 4.6rem);
                line-height: 1.04;
                letter-spacing: -.045em;
                font-weight: 800;
            }

            .article-excerpt {
                max-width: 780px;
                margin: 1.5rem auto 0;
                color: var(--white-muted);
                font-size: 1.05rem;
                line-height: 1.8;
            }

            .article-meta {
                display: flex;
                justify-content: center;
                align-items: center;
                flex-wrap: wrap;
                gap: 1rem;
                margin-top: 1.5rem;
                color: var(--white-muted);
                font-size: .78rem;
            }

            .article-meta span {
                display: inline-flex;
                align-items: center;
                gap: .4rem;
            }

            .article-meta i {
                color: var(--cyan);
            }

            .article-meta-divider {
                width: 4px;
                height: 4px;
                border-radius: 50%;
                background: var(--glass-border-hover);
            }

            .article-featured-image {
                position: relative;
                max-width: 1080px;
                aspect-ratio: 16 / 8;
                margin: 0 auto 4rem;
                overflow: hidden;
                border: 1px solid var(--glass-border);
                border-radius: 24px;
                background: var(--card-bg);
                box-shadow:
                    0 30px 80px rgba(0, 0, 0, .35),
                    0 0 50px rgba(0, 229, 255, .04);
            }

            .article-featured-image img {
                width: 100%;
                height: 100%;
                display: block;
                object-fit: cover;
            }

            .article-featured-overlay {
                position: absolute;
                inset: 0;
                background: linear-gradient(to top,
                        rgba(8, 11, 17, .35),
                        transparent 45%);
                pointer-events: none;
            }

            .article-layout {
                display: grid;
                grid-template-columns: minmax(0, 1fr) 280px;
                gap: 3.5rem;
                align-items: start;
                max-width: 1080px;
                margin: 0 auto;
            }

            .article-content-wrapper {
                min-width: 0;
            }

            .article-content {
                color: rgba(255, 255, 255, .78);
                font-size: 1rem;
                line-height: 1.95;
            }

            .article-content>*:first-child {
                margin-top: 0;
            }

            .article-content h2 {
                margin: 2.8rem 0 1rem;
                color: var(--white);
                font-size: 1.65rem;
                line-height: 1.3;
                letter-spacing: -.025em;
            }

            .article-content h3 {
                margin: 2.2rem 0 .85rem;
                color: var(--white);
                font-size: 1.3rem;
            }

            .article-content p {
                margin: 0 0 1.3rem;
            }

            .article-content a {
                color: var(--cyan);
                text-decoration: underline;
                text-decoration-color: rgba(0, 229, 255, .35);
                text-underline-offset: 3px;
            }

            .article-content strong {
                color: var(--white);
                font-weight: 700;
            }

            .article-content ul,
            .article-content ol {
                margin: 1rem 0 1.5rem;
                padding-left: 1.4rem;
            }

            .article-content li {
                margin-bottom: .55rem;
            }

            .article-content blockquote {
                margin: 2rem 0;
                padding: 1.3rem 1.5rem;
                border-left: 3px solid var(--cyan);
                border-radius: 0 14px 14px 0;
                background: var(--cyan-subtle);
                color: var(--white);
            }

            .article-content img {
                max-width: 100%;
                height: auto;
                border: 1px solid var(--glass-border);
                border-radius: 16px;
            }

            .article-sidebar {
                position: sticky;
                top: 100px;
            }

            .sidebar-card {
                padding: 1.25rem;
                margin-bottom: 1rem;
                border: 1px solid var(--glass-border);
                border-radius: 18px;
                background: var(--card-bg);
                backdrop-filter: blur(18px);
                -webkit-backdrop-filter: blur(18px);
            }

            .sidebar-title {
                display: flex;
                align-items: center;
                gap: .5rem;
                margin: 0 0 1rem;
                color: var(--white);
                font-size: .9rem;
                font-weight: 700;
            }

            .sidebar-title i {
                color: var(--cyan);
            }

            .sidebar-categories {
                display: flex;
                flex-direction: column;
                gap: .45rem;
            }

            .sidebar-category {
                display: flex;
                align-items: center;
                justify-content: space-between;
                gap: .75rem;
                padding: .65rem .7rem;
                border-radius: 10px;
                color: var(--white-muted);
                text-decoration: none;
                font-size: .78rem;
                transition: var(--transition);
            }

            .sidebar-category:hover {
                color: var(--cyan);
                background: var(--cyan-subtle);
            }

            .sidebar-category-count {
                display: inline-flex;
                align-items: center;
                justify-content: center;
                min-width: 22px;
                height: 22px;
                padding: 0 .35rem;
                border-radius: 50px;
                background: rgba(255, 255, 255, .05);
                font-size: .68rem;
            }

            .share-buttons {
                display: flex;
                gap: .5rem;
            }

            .share-button {
                width: 38px;
                height: 38px;
                display: inline-flex;
                align-items: center;
                justify-content: center;
                border: 1px solid var(--glass-border);
                border-radius: 10px;
                background: rgba(255, 255, 255, .03);
                color: var(--white-muted);
                text-decoration: none;
                transition: var(--transition);
            }

            .share-button:hover {
                color: var(--cyan);
                border-color: var(--glass-border-hover);
                background: var(--cyan-subtle);
                transform: translateY(-2px);
            }

            .article-bottom {
                max-width: 1080px;
                margin: 3rem auto 0;
                padding-top: 1.5rem;
                border-top: 1px solid var(--glass-border);
            }

            .article-bottom-inner {
                display: flex;
                justify-content: space-between;
                align-items: center;
                gap: 1rem;
                flex-wrap: wrap;
            }

            .article-back {
                display: inline-flex;
                align-items: center;
                gap: .5rem;
                color: var(--white-muted);
                text-decoration: none;
                font-size: .82rem;
                font-weight: 600;
                transition: color .25s ease;
            }

            .article-back:hover {
                color: var(--cyan);
            }

            .comments-section {
                max-width: 1080px;
                margin: 5rem auto 0;
            }

            .section-heading {
                margin-bottom: 1.5rem;
            }

            .section-heading small {
                display: block;
                margin-bottom: .5rem;
                color: var(--cyan);
                font-size: .72rem;
                font-weight: 700;
                letter-spacing: .08em;
                text-transform: uppercase;
            }

            .section-heading h2 {
                margin: 0;
                color: var(--white);
                font-size: clamp(1.6rem, 3vw, 2.3rem);
                letter-spacing: -.03em;
            }

            .comments-list {
                display: flex;
                flex-direction: column;
                gap: 1rem;
            }

            .comment-card {
                padding: 1.25rem;
                border: 1px solid var(--glass-border);
                border-radius: 18px;
                background: var(--card-bg);
                backdrop-filter: blur(18px);
                -webkit-backdrop-filter: blur(18px);
            }

            .comment-header {
                display: flex;
                align-items: center;
                gap: .75rem;
            }

            .comment-avatar {
                width: 42px;
                height: 42px;
                flex: 0 0 42px;
                display: flex;
                align-items: center;
                justify-content: center;
                border: 1px solid var(--glass-border);
                border-radius: 50%;
                background: var(--cyan-subtle);
                color: var(--cyan);
                font-size: .85rem;
                font-weight: 800;
            }

            .comment-author {
                color: var(--white);
                font-size: .85rem;
                font-weight: 700;
            }

            .comment-date {
                margin-top: .15rem;
                color: var(--white-muted);
                font-size: .7rem;
            }

            .comment-body {
                margin: 1rem 0 0 3.2rem;
                color: var(--white-muted);
                font-size: .85rem;
                line-height: 1.75;
                white-space: pre-line;
                overflow-wrap: anywhere;
            }

            .comment-actions {
                margin: .85rem 0 0 3.2rem;
            }

            .reply-toggle {
                display: inline-flex;
                align-items: center;
                gap: .4rem;
                padding: .45rem .7rem;
                border: 1px solid var(--glass-border);
                border-radius: 8px;
                background: rgba(255, 255, 255, .03);
                color: var(--white-muted);
                font-size: .7rem;
                font-weight: 700;
                cursor: pointer;
                transition: var(--transition);
            }

            .reply-toggle:hover,
            .reply-toggle.active {
                border-color: var(--glass-border-hover);
                background: var(--cyan-subtle);
                color: var(--cyan);
            }

            .reply-form {
                margin: 1rem 0 0 3.2rem;
                padding: 1rem;
                border: 1px solid var(--glass-border);
                border-radius: 14px;
                background: rgba(255, 255, 255, .02);
            }

            .reply-form[hidden] {
                display: none;
            }

            .reply-form-grid {
                display: grid;
                grid-template-columns: repeat(2, minmax(0, 1fr));
                gap: .8rem;
            }

            .reply-form .comment-field.full {
                grid-column: 1 / -1;
            }

            .comment-replies {
                display: flex;
                flex-direction: column;
                gap: .75rem;
                margin: 1rem 0 0 3.2rem;
                padding-left: 1rem;
                border-left: 1px solid var(--glass-border);
            }

            .comment-reply {
                padding: 1rem;
                border: 1px solid var(--glass-border);
                border-radius: 14px;
                background: rgba(255, 255, 255, .02);
            }

            .reply-label {
                display: inline-flex;
                align-items: center;
                gap: .35rem;
                margin-bottom: .6rem;
                color: var(--cyan);
                font-size: .68rem;
                font-weight: 700;
                text-transform: uppercase;
                letter-spacing: .05em;
            }

            .comment-reply .comment-body {
                margin: .7rem 0 0;
            }

            .comment-form-card {
                margin-top: 2rem;
                padding: 1.5rem;
                border: 1px solid var(--glass-border);
                border-radius: 20px;
                background: var(--card-bg);
                backdrop-filter: blur(18px);
                -webkit-backdrop-filter: blur(18px);
            }

            .comment-form-card h3 {
                margin: 0 0 .4rem;
                color: var(--white);
                font-size: 1.15rem;
            }

            .comment-form-card>p {
                margin: 0 0 1.5rem;
                color: var(--white-muted);
                font-size: .78rem;
            }

            .comment-form-grid {
                display: grid;
                grid-template-columns: repeat(2, minmax(0, 1fr));
                gap: 1rem;
            }

            .comment-field {
                display: flex;
                flex-direction: column;
                gap: .45rem;
            }

            .comment-field.full {
                grid-column: 1 / -1;
            }

            .comment-field label {
                color: var(--white);
                font-size: .75rem;
                font-weight: 600;
            }

            .comment-field input,
            .comment-field textarea {
                width: 100%;
                border: 1px solid var(--glass-border);
                border-radius: 12px;
                outline: none;
                background: rgba(255, 255, 255, .03);
                color: var(--white);
                font: inherit;
                font-size: .82rem;
                transition:
                    border-color .25s ease,
                    background .25s ease,
                    box-shadow .25s ease;
            }

            .comment-field input {
                height: 44px;
                padding: 0 .9rem;
            }

            .comment-field textarea {
                min-height: 130px;
                padding: .85rem .9rem;
                resize: vertical;
            }

            .comment-field input::placeholder,
            .comment-field textarea::placeholder {
                color: rgba(255, 255, 255, .3);
            }

            .comment-field input:focus,
            .comment-field textarea:focus {
                border-color: var(--glass-border-hover);
                background: rgba(0, 229, 255, .025);
                box-shadow: 0 0 0 3px rgba(0, 229, 255, .06);
            }

            .comment-submit {
                display: inline-flex;
                align-items: center;
                gap: .5rem;
                margin-top: 1rem;
                padding: .75rem 1.1rem;
                border: 1px solid var(--cyan);
                border-radius: 10px;
                background: var(--cyan);
                color: var(--bg-deep);
                font-size: .8rem;
                font-weight: 800;
                cursor: pointer;
                transition: var(--transition);
            }

            .comment-submit:hover {
                transform: translateY(-2px);
                box-shadow: 0 10px 25px rgba(0, 229, 255, .15);
            }

            .no-comments {
                padding: 2rem;
                border: 1px solid var(--glass-border);
                border-radius: 18px;
                background: var(--card-bg);
                color: var(--white-muted);
                text-align: center;
                font-size: .85rem;
            }

            .no-comments i {
                display: block;
                margin-bottom: .65rem;
                color: var(--cyan);
                font-size: 1.4rem;
            }

            .comment-alert {
                display: flex;
                align-items: flex-start;
                gap: .75rem;
                margin-bottom: 1rem;
                padding: .9rem 1rem;
                border: 1px solid var(--glass-border);
                border-radius: 12px;
                font-size: .78rem;
            }

            .comment-alert>i {
                margin-top: .15rem;
                color: var(--cyan);
            }

            .comment-alert strong {
                display: block;
                margin-bottom: .25rem;
                color: var(--white);
            }

            .comment-alert ul {
                margin: .25rem 0 0;
                padding-left: 1rem;
                color: var(--white-muted);
            }

            .comment-alert-success {
                background: rgba(0, 229, 255, .04);
            }

            .comment-alert-error {
                background: rgba(255, 80, 80, .04);
            }

            .comment-alert-error>i {
                color: #ff6b6b;
            }

            .related-section {
                max-width: 1080px;
                margin: 5rem auto 0;
            }

            .related-grid {
                display: grid;
                grid-template-columns: repeat(3, minmax(0, 1fr));
                gap: 1rem;
            }

            .related-card {
                overflow: hidden;
                border: 1px solid var(--glass-border);
                border-radius: 18px;
                background: var(--card-bg);
                transition: var(--transition);
            }

            .related-card:hover {
                transform: translateY(-5px);
                border-color: var(--glass-border-hover);
            }

            .related-image {
                aspect-ratio: 16 / 9;
                overflow: hidden;
                background: var(--cyan-subtle);
            }

            .related-image img {
                width: 100%;
                height: 100%;
                display: block;
                object-fit: cover;
                transition: transform .5s ease;
            }

            .related-card:hover .related-image img {
                transform: scale(1.05);
            }

            .related-content {
                padding: 1rem;
            }

            .related-category {
                color: var(--cyan);
                font-size: .68rem;
                font-weight: 700;
                text-transform: uppercase;
            }

            .related-title {
                margin: .45rem 0 0;
                font-size: .95rem;
                line-height: 1.4;
            }

            .related-title a {
                color: var(--white);
                text-decoration: none;
                transition: color .25s ease;
            }

            .related-title a:hover {
                color: var(--cyan);
            }

            .related-date {
                margin-top: .6rem;
                color: var(--white-muted);
                font-size: .68rem;
            }

            @media (max-width: 991px) {
                .article-layout {
                    grid-template-columns: 1fr;
                }

                .article-sidebar {
                    position: static;
                    display: grid;
                    grid-template-columns: repeat(2, minmax(0, 1fr));
                    gap: 1rem;
                }

                .sidebar-card {
                    margin-bottom: 0;
                }

                .related-grid {
                    grid-template-columns: repeat(2, minmax(0, 1fr));
                }
            }

            @media (max-width: 768px) {
                .blog-show-page {
                    padding: 100px 1.25rem 4rem;
                }

                .article-featured-image {
                    margin-bottom: 3rem;
                    border-radius: 18px;
                }

                .article-layout {
                    gap: 2.5rem;
                }

                .article-sidebar {
                    grid-template-columns: 1fr;
                }

                .comment-body,
                .comment-actions,
                .reply-form {
                    margin-left: 0;
                }

                .comment-replies {
                    margin-left: 1rem;
                }
            }

            @media (max-width: 576px) {
                .blog-show-page {
                    padding: 95px 1rem 3rem;
                }

                .article-title {
                    font-size: clamp(2rem, 10vw, 3rem);
                }

                .article-excerpt {
                    font-size: .92rem;
                }

                .article-content {
                    font-size: .92rem;
                    line-height: 1.85;
                }

                .article-content h2 {
                    font-size: 1.4rem;
                }

                .article-featured-image {
                    aspect-ratio: 16 / 10;
                    border-radius: 15px;
                }

                .comment-form-grid,
                .reply-form-grid {
                    grid-template-columns: 1fr;
                }

                .comment-field.full,
                .reply-form .comment-field.full {
                    grid-column: auto;
                }

                .related-grid {
                    grid-template-columns: 1fr;
                }

                .article-bottom-inner {
                    align-items: flex-start;
                    flex-direction: column;
                }
            }
        </style>
    @endpush

    <main class="blog-show-page">
        <div class="blog-show-container">

            <nav class="blog-breadcrumb" aria-label="Breadcrumb">
                <a href="{{ route('blog.index') }}">
                    Blog
                </a>

                <i class="fa-solid fa-chevron-right"></i>

                @if ($post->category)
                    <a href="{{ route('blog.category', $post->category->slug) }}">
                        {{ $post->category->name }}
                    </a>

                    <i class="fa-solid fa-chevron-right"></i>
                @endif

                <span class="blog-breadcrumb-current">
                    {{ $post->title }}
                </span>
            </nav>

            <header class="article-header">

                @if ($post->category)
                    <a href="{{ route('blog.category', $post->category->slug) }}" class="article-category">
                        <i class="fa-solid fa-layer-group"></i>
                        {{ $post->category->name }}
                    </a>
                @endif

                <h1 class="article-title">
                    {{ $post->title }}
                </h1>

                @if ($post->excerpt)
                    <p class="article-excerpt">
                        {{ $post->excerpt }}
                    </p>
                @endif

                <div class="article-meta">

                    @if ($post->published_at)
                        <span>
                            <i class="fa-regular fa-calendar"></i>
                            {{ $post->published_at->format('M d, Y') }}
                        </span>

                        <span class="article-meta-divider"></span>
                    @endif

                    <span>
                        <i class="fa-regular fa-clock"></i>
                        {{ max(1, ceil(str_word_count(strip_tags($post->content)) / 200)) }}
                        min read
                    </span>

                    @if ($commentCount)
                        <span class="article-meta-divider"></span>

                        <span>
                            <i class="fa-regular fa-comments"></i>
                            {{ $commentCount }}
                            {{ Str::plural('Comment', $commentCount) }}
                        </span>
                    @endif

                </div>
            </header>

            @if ($post->featured_image)
                <div class="article-featured-image">
                    <img src="{{ asset('storage/' . $post->featured_image) }}" alt="{{ $post->title }}"
                        width="1600" height="800">

                    <div class="article-featured-overlay"></div>
                </div>
            @endif

            <div class="article-layout">

                <article class="article-content-wrapper">

                    <div class="article-content">
                        {!! $post->content !!}
                    </div>

                    <div class="article-bottom">
                        <div class="article-bottom-inner">

                            <a href="{{ route('blog.index') }}" class="article-back">
                                <i class="fa-solid fa-arrow-left"></i>
                                Back to Blog
                            </a>

                            <div class="share-buttons">

                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}"
                                    target="_blank" rel="noopener noreferrer" class="share-button"
                                    aria-label="Share on Facebook">
                                    <i class="fa-brands fa-facebook-f"></i>
                                </a>

                                <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(url()->current()) }}"
                                    target="_blank" rel="noopener noreferrer" class="share-button"
                                    aria-label="Share on LinkedIn">
                                    <i class="fa-brands fa-linkedin-in"></i>
                                </a>

                                <a href="https://twitter.com/intent/tweet?url={{ urlencode(url()->current()) }}&text={{ urlencode($post->title) }}"
                                    target="_blank" rel="noopener noreferrer" class="share-button"
                                    aria-label="Share on X">
                                    <i class="fa-brands fa-x-twitter"></i>
                                </a>

                            </div>
                        </div>
                    </div>

                </article>

                <aside class="article-sidebar">

                    @if ($categories->count())
                        <div class="sidebar-card">

                            <h3 class="sidebar-title">
                                <i class="fa-solid fa-folder-open"></i>
                                Categories
                            </h3>

                            <div class="sidebar-categories">

                                @foreach ($categories as $category)
                                    <a href="{{ route('blog.category', $category->slug) }}" class="sidebar-category">
                                        <span>
                                            {{ $category->name }}
                                        </span>

                                        <span class="sidebar-category-count">
                                            {{ $category->posts_count }}
                                        </span>
                                    </a>
                                @endforeach

                            </div>

                        </div>
                    @endif

                    <div class="sidebar-card">

                        <h3 class="sidebar-title">
                            <i class="fa-solid fa-share-nodes"></i>
                            Share Article
                        </h3>

                        <div class="share-buttons">

                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}"
                                target="_blank" rel="noopener noreferrer" class="share-button"
                                aria-label="Share on Facebook">
                                <i class="fa-brands fa-facebook-f"></i>
                            </a>

                            <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(url()->current()) }}"
                                target="_blank" rel="noopener noreferrer" class="share-button"
                                aria-label="Share on LinkedIn">
                                <i class="fa-brands fa-linkedin-in"></i>
                            </a>

                            <a href="https://twitter.com/intent/tweet?url={{ urlencode(url()->current()) }}&text={{ urlencode($post->title) }}"
                                target="_blank" rel="noopener noreferrer" class="share-button" aria-label="Share on X">
                                <i class="fa-brands fa-x-twitter"></i>
                            </a>

                        </div>

                    </div>

                </aside>

            </div>

            <section class="comments-section" id="comments">

                <div class="section-heading">
                    <small>Community</small>

                    <h2>
                        {{ $commentCount }}
                        {{ Str::plural('Comment', $commentCount) }}
                    </h2>
                </div>

                @if ($errors->any())
                    <div class="comment-alert comment-alert-error">
                        <i class="fa-solid fa-circle-exclamation"></i>

                        <div>
                            <strong>Please check the form.</strong>

                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif

                @if (session('comment_success'))
                    <div class="comment-alert comment-alert-success">
                        <i class="fa-solid fa-circle-check"></i>

                        <span>
                            {{ session('comment_success') }}
                        </span>
                    </div>
                @endif

                @if ($commentCount)

                    <div class="comments-list">

                        @foreach ($post->approvedComments as $comment)
                            <article class="comment-card">

                                <div class="comment-header">

                                    <div class="comment-avatar">
                                        {{ strtoupper(substr($comment->name, 0, 1)) }}
                                    </div>

                                    <div>
                                        <div class="comment-author">
                                            {{ $comment->name }}
                                        </div>

                                        <div class="comment-date">
                                            {{ $comment->created_at->format('M d, Y \a\t h:i A') }}
                                        </div>
                                    </div>

                                </div>

                                <div class="comment-body">
                                    {{ $comment->comment }}
                                </div>

                                <div class="comment-actions">

                                    <button type="button" class="reply-toggle"
                                        data-reply-target="reply-form-{{ $comment->id }}">
                                        <i class="fa-solid fa-reply"></i>
                                        Reply
                                    </button>

                                </div>

                                <div id="reply-form-{{ $comment->id }}" class="reply-form" hidden>

                                    <form action="{{ route('blog.comments.reply', $comment) }}" method="POST">
                                        @csrf

                                        <div class="reply-form-grid">

                                            <div class="comment-field">

                                                <label for="reply-name-{{ $comment->id }}">
                                                    Name
                                                </label>

                                                <input type="text" id="reply-name-{{ $comment->id }}"
                                                    name="name" value="{{ old('name') }}"
                                                    placeholder="Your name" required>

                                            </div>

                                            <div class="comment-field">

                                                <label for="reply-email-{{ $comment->id }}">
                                                    Email
                                                </label>

                                                <input type="email" id="reply-email-{{ $comment->id }}"
                                                    name="email" value="{{ old('email') }}"
                                                    placeholder="you@example.com" required>

                                            </div>

                                            <div class="comment-field full">

                                                <label for="reply-message-{{ $comment->id }}">
                                                    Reply
                                                </label>

                                                <textarea id="reply-message-{{ $comment->id }}" name="comment" placeholder="Write your reply..." required>{{ old('comment') }}</textarea>

                                            </div>

                                        </div>

                                        <button type="submit" class="comment-submit reply-submit">
                                            Post Reply
                                            <i class="fa-solid fa-arrow-right"></i>
                                        </button>

                                    </form>

                                </div>

                                @if ($comment->approvedReplies->count())
                                    <div class="comment-replies">

                                        @foreach ($comment->approvedReplies as $reply)
                                            <div class="comment-reply">

                                                <div class="reply-label">
                                                    <i class="fa-solid fa-reply"></i>
                                                    Reply
                                                </div>

                                                <div class="comment-header">

                                                    <div class="comment-avatar">
                                                        {{ strtoupper(substr($reply->name, 0, 1)) }}
                                                    </div>

                                                    <div>

                                                        <div class="comment-author">
                                                            {{ $reply->name }}
                                                        </div>

                                                        <div class="comment-date">
                                                            {{ $reply->created_at->format('M d, Y \a\t h:i A') }}
                                                        </div>

                                                    </div>

                                                </div>

                                                <div class="comment-body">
                                                    {{ $reply->comment }}
                                                </div>

                                            </div>
                                        @endforeach

                                    </div>
                                @endif

                            </article>
                        @endforeach

                    </div>
                @else
                    <div class="no-comments">
                        <i class="fa-regular fa-comments"></i>
                        Be the first to share your thoughts about this article.
                    </div>

                @endif

                <div class="comment-form-card">

                    <h3>
                        Leave a Comment
                    </h3>

                    <p>
                        Your comment will be reviewed before appearing publicly.
                    </p>

                    <form action="{{ route('blog.comments.store', $post) }}" method="POST">
                        @csrf

                        <div class="comment-form-grid">

                            <div class="comment-field">

                                <label for="comment-name">
                                    Name
                                </label>

                                <input type="text" id="comment-name" name="name" value="{{ old('name') }}"
                                    placeholder="Your name" required>

                            </div>

                            <div class="comment-field">

                                <label for="comment-email">
                                    Email
                                </label>

                                <input type="email" id="comment-email" name="email" value="{{ old('email') }}"
                                    placeholder="you@example.com" required>

                            </div>

                            <div class="comment-field full">

                                <label for="comment-message">
                                    Comment
                                </label>

                                <textarea id="comment-message" name="comment" placeholder="Write your comment..." required>{{ old('comment') }}</textarea>

                            </div>

                        </div>

                        <button type="submit" class="comment-submit">
                            Post Comment
                            <i class="fa-solid fa-arrow-right"></i>
                        </button>

                    </form>

                </div>

            </section>

            @if ($relatedPosts->count())

                <section class="related-section">

                    <div class="section-heading">

                        <small>
                            Keep Reading
                        </small>

                        <h2>
                            Related Articles
                        </h2>

                    </div>

                    <div class="related-grid">

                        @foreach ($relatedPosts as $related)
                            <article class="related-card">

                                <div class="related-image">

                                    @if ($related->featured_image)
                                        <img src="{{ asset('storage/' . $related->featured_image) }}"
                                            alt="{{ $related->title }}" loading="lazy" width="800"
                                            height="450">
                                    @else
                                        <div
                                            style="
                                                width:100%;
                                                height:100%;
                                                display:flex;
                                                align-items:center;
                                                justify-content:center;
                                                color:var(--cyan);
                                                font-size:1.5rem;
                                            ">
                                            <i class="fa-solid fa-newspaper"></i>
                                        </div>
                                    @endif

                                </div>

                                <div class="related-content">

                                    @if ($related->category)
                                        <div class="related-category">
                                            {{ $related->category->name }}
                                        </div>
                                    @endif

                                    <h3 class="related-title">

                                        <a href="{{ route('blog.show', $related->slug) }}">
                                            {{ $related->title }}
                                        </a>

                                    </h3>

                                    @if ($related->published_at)
                                        <div class="related-date">
                                            {{ $related->published_at->format('M d, Y') }}
                                        </div>
                                    @endif

                                </div>

                            </article>
                        @endforeach

                    </div>

                </section>

            @endif

        </div>
    </main>

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const replyButtons = document.querySelectorAll('.reply-toggle');

                replyButtons.forEach(function(button) {
                    button.addEventListener('click', function() {
                        const targetId = button.dataset.replyTarget;
                        const target = document.getElementById(targetId);

                        if (!target) {
                            return;
                        }

                        const isHidden = target.hasAttribute('hidden');

                        document.querySelectorAll('.reply-form').forEach(function(form) {
                            form.setAttribute('hidden', '');
                        });

                        document.querySelectorAll('.reply-toggle').forEach(function(item) {
                            item.classList.remove('active');
                        });

                        if (isHidden) {
                            target.removeAttribute('hidden');
                            button.classList.add('active');

                            const input = target.querySelector('input');

                            if (input) {
                                input.focus();
                            }
                        }
                    });
                });
            });
        </script>
    @endpush

</x-guest-layout>
