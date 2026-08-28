<?php

namespace Database\Seeders;

use App\Models\BlogCategory;
use App\Models\BlogComment;
use App\Models\BlogPost;
use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    public function run(): void
    {
        /*
        |--------------------------------------------------------------------------
        | Clean Existing Blog Data
        |--------------------------------------------------------------------------
        */

        // Delete comments first because they belong to posts.
        BlogComment::query()->delete();

        // Then delete posts.
        BlogPost::query()->delete();

        // Finally delete categories.
        BlogCategory::query()->delete();


        /*
        |--------------------------------------------------------------------------
        | Categories
        |--------------------------------------------------------------------------
        */

        $categories = [
            [
                'name' => 'Web Development',
                'slug' => 'web-development',
                'description' => 'Articles about modern web development, frameworks, architecture, performance and best practices.',
                'status' => true,
            ],
            [
                'name' => 'Laravel',
                'slug' => 'laravel',
                'description' => 'Laravel development guides, tutorials, tips, architecture and best practices.',
                'status' => true,
            ],
            [
                'name' => 'PHP',
                'slug' => 'php',
                'description' => 'PHP programming tutorials, development practices and modern PHP ecosystem updates.',
                'status' => true,
            ],
            [
                'name' => 'Software Development',
                'slug' => 'software-development',
                'description' => 'Software engineering, custom software development, architecture and business applications.',
                'status' => true,
            ],
            [
                'name' => 'Mobile App Development',
                'slug' => 'mobile-app-development',
                'description' => 'Mobile application development, technology choices, UX and development strategies.',
                'status' => true,
            ],
            [
                'name' => 'AI & Technology',
                'slug' => 'ai-technology',
                'description' => 'Artificial intelligence, automation and emerging technology trends for modern businesses.',
                'status' => true,
            ],
        ];

        $categoryModels = [];

        foreach ($categories as $category) {
            $categoryModels[$category['slug']] = BlogCategory::create($category);
        }


        /*
        |--------------------------------------------------------------------------
        | Blog Posts
        |--------------------------------------------------------------------------
        */

        $posts = [
            [
                'category' => 'laravel',
                'title' => 'Laravel Development Best Practices for Modern Web Applications',
                'slug' => 'laravel-development-best-practices',
                'excerpt' => 'Discover practical Laravel development best practices for building secure, scalable and maintainable web applications.',
                'content' => <<<'HTML'
                    <p>Laravel is one of the most popular PHP frameworks for building modern web applications. Its expressive syntax, powerful ecosystem and developer-friendly tools make it suitable for projects ranging from small business websites to complex enterprise applications.</p>

                    <h2>Use a Clean Application Structure</h2>

                    <p>A well-organized Laravel application is easier to maintain and extend. Controllers should remain focused on HTTP requests while business logic can be separated into dedicated services when the application grows.</p>

                    <h2>Use Form Requests for Validation</h2>

                    <p>Laravel Form Request classes provide a clean way to organize validation and authorization rules without filling controllers with validation logic.</p>

                    <h2>Use Eloquent Relationships Properly</h2>

                    <p>Laravel Eloquent makes it easy to work with related data. Defining clear relationships between models improves readability and makes database operations easier to manage.</p>

                    <h2>Keep Performance in Mind</h2>

                    <p>Database indexes, eager loading, caching and optimized queries can significantly improve application performance.</p>

                    <p>Following these practices helps teams build Laravel applications that are easier to test, maintain and scale.</p>
                    HTML,
                'featured_image' => 'blog/laravel-development-best-practices.jpg',
                'status' => 'published',
                'published_at' => now()->subDays(2),
            ],

            [
                'category' => 'laravel',
                'title' => 'Why Laravel Is a Great Choice for Business Applications',
                'slug' => 'why-laravel-is-great-for-business-applications',
                'excerpt' => 'Learn why Laravel is a strong technology choice for custom business applications and enterprise software.',
                'content' => <<<'HTML'
                    <p>Businesses increasingly need custom software that matches their specific workflows. Laravel provides a strong foundation for developing these applications efficiently.</p>

                    <h2>Rapid Development</h2>

                    <p>Laravel provides authentication, routing, queues, notifications, database tools and many other features out of the box.</p>

                    <h2>Scalable Architecture</h2>

                    <p>With good architecture and infrastructure, Laravel applications can scale as business requirements grow.</p>

                    <h2>Strong Developer Ecosystem</h2>

                    <p>The Laravel ecosystem provides a large collection of tools and packages that help development teams solve common problems.</p>

                    <h2>Business Automation</h2>

                    <p>Laravel can be used to build ERP systems, CRM platforms, workflow management systems, dashboards and custom internal applications.</p>
                    HTML,
                'featured_image' => 'blog/laravel-business-applications.jpg',
                'status' => 'published',
                'published_at' => now()->subDays(5),
            ],

            [
                'category' => 'web-development',
                'title' => 'How to Choose the Right Web Development Company',
                'slug' => 'how-to-choose-the-right-web-development-company',
                'excerpt' => 'A practical guide to choosing a reliable web development company for your business website or web application.',
                'content' => <<<'HTML'
                    <p>Choosing the right web development partner can have a major impact on the success of a digital project.</p>

                    <h2>Understand Your Requirements</h2>

                    <p>Before contacting a development company, define the main objectives, features and expected outcomes of your project.</p>

                    <h2>Review Technical Experience</h2>

                    <p>Look for a development team with experience in the technologies required by your project.</p>

                    <h2>Check Previous Work</h2>

                    <p>Review previous projects to understand the team's development quality, design capabilities and technical approach.</p>

                    <h2>Discuss Long-Term Support</h2>

                    <p>A website or software application often requires maintenance after launch. Ask about ongoing support, security updates and future improvements.</p>
                    HTML,
                'featured_image' => 'blog/choose-web-development-company.jpg',
                'status' => 'published',
                'published_at' => now()->subDays(8),
            ],

            [
                'category' => 'software-development',
                'title' => 'Custom Software Development: A Complete Guide for Businesses',
                'slug' => 'custom-software-development-guide',
                'excerpt' => 'Understand how custom software development can help businesses automate workflows and improve operational efficiency.',
                'content' => <<<'HTML'
                    <p>Custom software is designed around the specific needs of an organization rather than forcing the organization to adapt to generic software.</p>

                    <h2>What Is Custom Software?</h2>

                    <p>Custom software is an application developed specifically for a business, organization or workflow.</p>

                    <h2>Benefits of Custom Software</h2>

                    <ul>
                    <li>Business-specific workflows</li>
                    <li>Better integration with existing systems</li>
                    <li>Greater flexibility</li>
                    <li>Improved automation</li>
                    <li>Scalable architecture</li>
                    </ul>

                    <h2>When Should a Business Consider Custom Software?</h2>

                    <p>Businesses should consider custom software when existing tools cannot efficiently support their processes or when automation can provide significant operational benefits.</p>
                    HTML,
                'featured_image' => 'blog/custom-software-development.jpg',
                'status' => 'published',
                'published_at' => now()->subDays(11),
            ],

            [
                'category' => 'php',
                'title' => 'Modern PHP Development: Best Practices Developers Should Follow',
                'slug' => 'modern-php-development-best-practices',
                'excerpt' => 'Explore modern PHP development practices for writing cleaner, more secure and maintainable applications.',
                'content' => <<<'HTML'
                    <p>PHP continues to power a large portion of the web. Modern PHP development focuses on clean architecture, strong typing, testing and maintainability.</p>

                    <h2>Use Modern PHP Features</h2>

                    <p>Modern PHP versions provide features that make applications more expressive and easier to maintain.</p>

                    <h2>Use Type Declarations</h2>

                    <p>Type declarations help developers understand what data functions and methods expect.</p>

                    <h2>Follow SOLID Principles</h2>

                    <p>SOLID principles can help development teams create flexible and maintainable application architectures.</p>

                    <h2>Write Testable Code</h2>

                    <p>Automated testing helps reduce regressions and makes future development safer.</p>
                    HTML,
                'featured_image' => 'blog/modern-php-development.jpg',
                'status' => 'published',
                'published_at' => now()->subDays(14),
            ],

            [
                'category' => 'mobile-app-development',
                'title' => 'Native vs Cross-Platform Mobile App Development',
                'slug' => 'native-vs-cross-platform-mobile-app-development',
                'excerpt' => 'Compare native and cross-platform mobile application development to determine which approach fits your project.',
                'content' => <<<'HTML'
                    <p>Choosing the right mobile development approach depends on project requirements, budget, performance expectations and development resources.</p>

                    <h2>Native Development</h2>

                    <p>Native applications are built specifically for a mobile operating system. They can provide excellent platform integration and performance.</p>

                    <h2>Cross-Platform Development</h2>

                    <p>Cross-platform frameworks allow teams to build applications for multiple platforms using a shared codebase.</p>

                    <h2>Which Should You Choose?</h2>

                    <p>The best approach depends on the application's features and long-term requirements.</p>
                    HTML,
                'featured_image' => 'blog/native-vs-cross-platform.jpg',
                'status' => 'published',
                'published_at' => now()->subDays(17),
            ],

            [
                'category' => 'ai-technology',
                'title' => 'How AI Can Help Businesses Automate Repetitive Tasks',
                'slug' => 'how-ai-can-help-businesses-automate-tasks',
                'excerpt' => 'Explore practical ways businesses can use artificial intelligence to automate repetitive processes and improve productivity.',
                'content' => <<<'HTML'
                    <p>Artificial intelligence is becoming increasingly useful for businesses looking to automate repetitive work and improve decision-making.</p>

                    <h2>Customer Support</h2>

                    <p>AI-powered systems can help organize customer questions and provide faster responses to common requests.</p>

                    <h2>Document Processing</h2>

                    <p>AI can assist with extracting information from documents and organizing large amounts of business data.</p>

                    <h2>Business Reporting</h2>

                    <p>AI-powered analysis can help teams identify trends and summarize large datasets.</p>

                    <h2>Workflow Automation</h2>

                    <p>Combining AI with business software can reduce repetitive manual tasks and improve operational efficiency.</p>
                    HTML,
                'featured_image' => 'blog/ai-business-automation.jpg',
                'status' => 'published',
                'published_at' => now()->subDays(20),
            ],

            [
                'category' => 'laravel',
                'title' => 'Laravel API Development: Building Scalable Backend Systems',
                'slug' => 'laravel-api-development-scalable-backend',
                'excerpt' => 'Learn the fundamentals of building scalable and maintainable APIs with Laravel.',
                'content' => <<<'HTML'
                    <p>APIs are an essential part of modern software architecture. Laravel provides a powerful foundation for developing secure and maintainable API backends.</p>

                    <h2>Design Clear API Endpoints</h2>

                    <p>Consistent resource-based endpoints make APIs easier for frontend and mobile developers to consume.</p>

                    <h2>Use Request Validation</h2>

                    <p>Incoming API data should always be validated before being processed.</p>

                    <h2>Authentication</h2>

                    <p>Modern applications should use appropriate authentication and authorization mechanisms to protect API resources.</p>

                    <h2>API Versioning</h2>

                    <p>Versioning can help teams evolve APIs while maintaining compatibility with existing applications.</p>
                    HTML,
                'featured_image' => 'blog/laravel-api-development.jpg',
                'status' => 'published',
                'published_at' => now()->subDays(23),
            ],

            [
                'category' => 'web-development',
                'title' => 'Website Performance Optimization: Practical Techniques',
                'slug' => 'website-performance-optimization-techniques',
                'excerpt' => 'Learn practical website performance optimization techniques that can improve user experience and loading speed.',
                'content' => <<<'HTML'
                    <p>Website performance affects user experience, accessibility and business outcomes.</p>

                    <h2>Optimize Images</h2>

                    <p>Large images can significantly increase page load times. Proper formats, dimensions and compression can reduce unnecessary network usage.</p>

                    <h2>Optimize CSS and JavaScript</h2>

                    <p>Reducing unnecessary assets and loading only what is required can improve performance.</p>

                    <h2>Improve Database Queries</h2>

                    <p>Efficient database queries and proper indexing are important for dynamic applications.</p>

                    <h2>Use Caching</h2>

                    <p>Caching frequently accessed information can reduce server processing and improve response times.</p>
                    HTML,
                'featured_image' => 'blog/website-performance-optimization.jpg',
                'status' => 'published',
                'published_at' => now()->subDays(26),
            ],

            [
                'category' => 'software-development',
                'title' => 'ERP Software Development: Key Features Businesses Need',
                'slug' => 'erp-software-development-key-features',
                'excerpt' => 'Explore the key features businesses should consider when developing a custom ERP software solution.',
                'content' => <<<'HTML'
                    <p>ERP software can centralize business processes and provide organizations with better visibility into their operations.</p>

                    <h2>User Management</h2>

                    <p>Role-based access control allows organizations to control which users can access specific features.</p>

                    <h2>Workflow Management</h2>

                    <p>Custom workflows can automate approvals, assignments and operational processes.</p>

                    <h2>Reporting</h2>

                    <p>Dashboards and reports provide management with useful business insights.</p>

                    <h2>Integration</h2>

                    <p>A modern ERP system should be able to integrate with other business applications and services.</p>
                    HTML,
                'featured_image' => 'blog/erp-software-development.jpg',
                'status' => 'published',
                'published_at' => now()->subDays(30),
            ],

            [
                'category' => 'php',
                'title' => 'Laravel vs Core PHP: Which Is Better for Web Development?',
                'slug' => 'laravel-vs-core-php',
                'excerpt' => 'Compare Laravel and Core PHP and understand when each approach makes sense for web development projects.',
                'content' => <<<'HTML'
                    <p>Laravel and Core PHP can both be used to build web applications, but they provide very different development experiences.</p>

                    <h2>Core PHP</h2>

                    <p>Core PHP gives developers direct control over application structure and implementation but requires more development work for common features.</p>

                    <h2>Laravel</h2>

                    <p>Laravel provides routing, ORM, authentication tools, validation, queues and many other features that accelerate development.</p>

                    <h2>Which Should You Choose?</h2>

                    <p>For modern business applications, Laravel can provide a strong foundation because of its ecosystem and development tools.</p>
                    HTML,
                'featured_image' => 'blog/laravel-vs-core-php.jpg',
                'status' => 'published',
                'published_at' => now()->subDays(34),
            ],

            [
                'category' => 'ai-technology',
                'title' => 'AI-Powered Software Development: Opportunities for Businesses',
                'slug' => 'ai-powered-software-development-business',
                'excerpt' => 'Discover how AI-powered software can create new opportunities for businesses and improve operational efficiency.',
                'content' => <<<'HTML'
                    <p>AI is changing how businesses interact with software. Instead of simply automating individual tasks, AI can become part of larger business workflows.</p>

                    <h2>Intelligent Search</h2>

                    <p>AI can make large collections of business information easier to search and understand.</p>

                    <h2>Document Analysis</h2>

                    <p>AI systems can assist teams in extracting and organizing information from business documents.</p>

                    <h2>Predictive Insights</h2>

                    <p>Historical business data can be analyzed to identify patterns and support better decision-making.</p>
                    HTML,
                'featured_image' => 'blog/ai-powered-software-development.jpg',
                'status' => 'draft',
                'published_at' => null,
            ],
        ];


        /*
        |--------------------------------------------------------------------------
        | Create Posts
        |--------------------------------------------------------------------------
        */

        $postModels = [];

        foreach ($posts as $postData) {

            $categorySlug = $postData['category'];

            unset($postData['category']);

            $postData['category_id'] = $categoryModels[$categorySlug]->id;

            $post = BlogPost::create($postData);

            $postModels[$post->slug] = $post;
        }


        /*
        |--------------------------------------------------------------------------
        | Comments + Replies
        |--------------------------------------------------------------------------
        */

        $this->createCommentWithReplies(
            $postModels['laravel-development-best-practices'],
            [
                'name' => 'Rahim Ahmed',
                'email' => 'rahim@example.com',
                'comment' => 'Very useful Laravel tips. The section about application structure was especially helpful.',
            ],
            [
                [
                    'name' => 'Areia Soft',
                    'email' => 'hello@areiasoft.com',
                    'comment' => 'Thank you for reading! We are glad you found the article useful.',
                ],
                [
                    'name' => 'Karim Hasan',
                    'email' => 'karim@example.com',
                    'comment' => 'I also found the architecture section useful.',
                ],
            ]
        );

        $this->createCommentWithReplies(
            $postModels['laravel-development-best-practices'],
            [
                'name' => 'Sakib Khan',
                'email' => 'sakib@example.com',
                'comment' => 'Could you write an article about Laravel API authentication?',
            ],
            [
                [
                    'name' => 'Areia Soft',
                    'email' => 'hello@areiasoft.com',
                    'comment' => 'Yes, that is a great topic. We will cover Laravel API development in another article.',
                ],
            ]
        );

        $this->createCommentWithReplies(
            $postModels['why-laravel-is-great-for-business-applications'],
            [
                'name' => 'Nayeem',
                'email' => 'nayeem@example.com',
                'comment' => 'Laravel has been a great choice for our internal business application.',
            ],
            [
                [
                    'name' => 'Areia Soft',
                    'email' => 'hello@areiasoft.com',
                    'comment' => 'Absolutely. Laravel is especially useful when business workflows need to be customized.',
                ],
            ]
        );

        $this->createCommentWithReplies(
            $postModels['how-to-choose-the-right-web-development-company'],
            [
                'name' => 'Tanvir',
                'email' => 'tanvir@example.com',
                'comment' => 'The point about long-term support is often overlooked when selecting a development company.',
            ],
            [
                [
                    'name' => 'Areia Soft',
                    'email' => 'hello@areiasoft.com',
                    'comment' => 'Exactly. A successful software project should also consider maintenance and future improvements.',
                ],
            ]
        );

        $this->createCommentWithReplies(
            $postModels['custom-software-development-guide'],
            [
                'name' => 'Imran',
                'email' => 'imran@example.com',
                'comment' => 'How long does a typical custom software project take?',
            ],
            [
                [
                    'name' => 'Areia Soft',
                    'email' => 'hello@areiasoft.com',
                    'comment' => 'It depends on the scope, integrations and complexity. A proper requirement analysis is usually the first step.',
                ],
            ]
        );

        $this->createCommentWithReplies(
            $postModels['laravel-api-development-scalable-backend'],
            [
                'name' => 'Fahim',
                'email' => 'fahim@example.com',
                'comment' => 'The API versioning point is very important for long-term projects.',
            ],
            [
                [
                    'name' => 'Areia Soft',
                    'email' => 'hello@areiasoft.com',
                    'comment' => 'Yes. Planning API evolution early can prevent compatibility problems later.',
                ],
            ]
        );

        $this->createCommentWithReplies(
            $postModels['website-performance-optimization-techniques'],
            [
                'name' => 'Arif',
                'email' => 'arif@example.com',
                'comment' => 'Image optimization made a noticeable difference on our website.',
            ],
            [
                [
                    'name' => 'Mithun',
                    'email' => 'mithun@example.com',
                    'comment' => 'Same experience here. Large images were one of our biggest performance problems.',
                ],
            ]
        );

        /*
        |--------------------------------------------------------------------------
        | Additional Standalone Comments
        |--------------------------------------------------------------------------
        */

        BlogComment::create([
            'blog_post_id' => $postModels['laravel-vs-core-php']->id,
            'parent_id' => null,
            'name' => 'Rafi',
            'email' => 'rafi@example.com',
            'comment' => 'Good comparison. Laravel definitely makes larger applications easier to organize.',
            'status' => 'approved',
        ]);

        BlogComment::create([
            'blog_post_id' => $postModels['native-vs-cross-platform-mobile-app-development']->id,
            'parent_id' => null,
            'name' => 'Siam',
            'email' => 'siam@example.com',
            'comment' => 'This helped me understand the difference between the two approaches.',
            'status' => 'pending',
        ]);

        BlogComment::create([
            'blog_post_id' => $postModels['how-ai-can-help-businesses-automate-tasks']->id,
            'parent_id' => null,
            'name' => 'Hasan',
            'email' => 'hasan@example.com',
            'comment' => 'AI-powered document processing looks very promising for businesses.',
            'status' => 'approved',
        ]);


        /*
        |--------------------------------------------------------------------------
        | Finished
        |--------------------------------------------------------------------------
        */

        $this->command?->info('Blog seeder completed successfully.');
        $this->command?->info('Categories: ' . BlogCategory::count());
        $this->command?->info('Posts: ' . BlogPost::count());
        $this->command?->info('Comments: ' . BlogComment::count());
        $this->command?->info('Replies: ' . BlogComment::whereNotNull('parent_id')->count());
    }


    /**
     * Create a comment and its replies.
     */
    private function createCommentWithReplies(
        BlogPost $post,
        array $commentData,
        array $replies = []
    ): BlogComment {
        $comment = BlogComment::create([
            'blog_post_id' => $post->id,
            'parent_id' => null,
            'name' => $commentData['name'],
            'email' => $commentData['email'],
            'comment' => $commentData['comment'],
            'status' => 'approved',
        ]);

        foreach ($replies as $reply) {
            BlogComment::create([
                'blog_post_id' => $post->id,
                'parent_id' => $comment->id,
                'name' => $reply['name'],
                'email' => $reply['email'],
                'comment' => $reply['comment'],
                'status' => 'approved',
            ]);
        }

        return $comment;
    }
}
