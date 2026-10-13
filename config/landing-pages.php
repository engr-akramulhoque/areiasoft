<?php

return [

    /*
    |--------------------------------------------------------------------------
    | SEO Landing Pages
    |--------------------------------------------------------------------------
    |
    | These are dedicated SEO landing pages.
    | They are intentionally separate from the existing service pages.
    |
    */

    'pages' => [

        /*
        |--------------------------------------------------------------------------
        | 1. Website Development
        |--------------------------------------------------------------------------
        */

        'website-development' => [

            'slug' => 'website-development',

            'title' => 'Website Development',

            'eyebrow' => 'WEBSITE DEVELOPMENT',

            'seo_title' => 'Website Development Company | Custom Web Solutions | Areia Soft',

            'meta_description' => 'Areia Soft provides custom website development for businesses that need fast, scalable and conversion-focused websites built around their goals.',

            'keywords' => [
                'website development company',
                'website development services',
                'custom website development',
                'business website development',
                'professional website development',
            ],

            'hero_title' => 'Websites built to support your business, not just showcase it.',

            'hero_description' => 'We design and develop fast, responsive and scalable websites that combine strong user experience with a reliable technical foundation.',

            'hero_image' => 'static/frontend/assets/images/services/ui-ux-design.webp',

            'primary_cta' => 'Start Your Website Project',
            'primary_cta_url' => 'contact',

            'secondary_cta' => 'Explore Our Services',
            'secondary_cta_url' => 'services',

            'trust_points' => [
                'Custom-built websites',
                'Responsive across devices',
                'SEO-friendly architecture',
                'Performance-focused development',
            ],

            'problem' => [
                'title' => 'A website should do more than look good',

                'text' => 'Slow pages, confusing navigation and generic templates can make it harder for visitors to trust your business or take the next step. Your website needs to work as part of your business strategy.',

                'points' => [
                    'Outdated or difficult-to-manage websites',
                    'Poor mobile experience',
                    'Slow page performance',
                    'Weak conversion paths',
                ],
            ],

            'solution' => [
                'title' => 'A website engineered around your business',

                'text' => 'We build websites around your content, customers and business objectives instead of forcing your requirements into a pre-made structure.',

                'points' => [
                    'Clear information architecture',
                    'Conversion-focused page structures',
                    'Mobile-first responsive layouts',
                    'Clean and maintainable code',
                    'Technical SEO foundations',
                    'Flexible content management',
                ],
            ],

            'capabilities' => [
                [
                    'title' => 'Corporate Websites',
                    'text' => 'Professional websites designed to establish credibility and communicate your services clearly.',
                    'icon' => 'building',
                ],
                [
                    'title' => 'Business Websites',
                    'text' => 'Purpose-built websites that help businesses generate enquiries and communicate their value.',
                    'icon' => 'briefcase',
                ],
                [
                    'title' => 'Custom Websites',
                    'text' => 'Unique website experiences developed around specific business requirements.',
                    'icon' => 'code',
                ],
                [
                    'title' => 'CMS Websites',
                    'text' => 'Flexible content-driven websites that are easier for teams to maintain and update.',
                    'icon' => 'layout',
                ],
                [
                    'title' => 'Landing Pages',
                    'text' => 'Focused landing pages designed around specific campaigns, services and conversion goals.',
                    'icon' => 'target',
                ],
                [
                    'title' => 'Website Redesign',
                    'text' => 'Modernize an existing website while improving usability, performance and structure.',
                    'icon' => 'refresh',
                ],
            ],

            'process' => [
                [
                    'number' => '01',
                    'title' => 'Discover',
                    'text' => 'We understand your business, audience, content and project objectives.',
                ],
                [
                    'number' => '02',
                    'title' => 'Plan',
                    'text' => 'We define the site structure, user journeys, content hierarchy and technical approach.',
                ],
                [
                    'number' => '03',
                    'title' => 'Design',
                    'text' => 'We create a clear visual experience focused on usability and brand consistency.',
                ],
                [
                    'number' => '04',
                    'title' => 'Develop',
                    'text' => 'Our developers turn the approved experience into a responsive, functional website.',
                ],
                [
                    'number' => '05',
                    'title' => 'Launch',
                    'text' => 'We test the website, optimize its performance and prepare it for production.',
                ],
            ],

            'technologies' => [
                'Laravel',
                'PHP',
                'HTML5',
                'CSS3',
                'JavaScript',
                'MySQL',
                'WordPress',
            ],

            'benefits' => [
                'Better user experience',
                'Improved website performance',
                'Scalable technical foundation',
                'Search-friendly structure',
                'Easy future expansion',
                'Professional digital presence',
            ],

            'related_pages' => [
                'software-development',
                'web-application-development',
                'ui-ux-design',
            ],

            'faqs' => [
                [
                    'question' => 'How long does website development take?',
                    'answer' => 'The timeline depends on the website size, functionality, content and integrations. A simple business website can be completed much faster than a complex custom platform.',
                ],
                [
                    'question' => 'Can you redesign an existing website?',
                    'answer' => 'Yes. We can redesign an existing website while improving its structure, user experience, performance and technical foundation.',
                ],
                [
                    'question' => 'Will the website be mobile friendly?',
                    'answer' => 'Yes. Responsive behavior is considered throughout the design and development process so the website works across modern desktop, tablet and mobile devices.',
                ],
            ],
        ],


        /*
        |--------------------------------------------------------------------------
        | 2. Software Development
        |--------------------------------------------------------------------------
        */

        'software-development' => [

            'slug' => 'software-development',

            'title' => 'Software Development',

            'eyebrow' => 'SOFTWARE DEVELOPMENT',

            'seo_title' => 'Software Development Company | Custom Software Solutions | Areia Soft',

            'meta_description' => 'Build custom software designed around your workflows, business rules and growth plans. Areia Soft develops scalable software solutions for modern businesses.',

            'keywords' => [
                'software development company',
                'custom software development',
                'software development services',
                'business software solutions',
                'custom business software',
            ],

            'hero_title' => 'Software built around the way your business works.',

            'hero_description' => 'We develop custom software that replaces inefficient processes, connects your operations and gives your team the tools they need to work better.',

            'hero_image' => 'assets/images/landing-pages/software-development.jpg',

            'primary_cta' => 'Discuss Your Software Idea',
            'primary_cta_url' => 'contact',

            'secondary_cta' => 'See Our Solutions',
            'secondary_cta_url' => 'services',

            'trust_points' => [
                'Custom business software',
                'Scalable architecture',
                'API and third-party integrations',
                'Long-term technical support',
            ],

            'problem' => [
                'title' => 'Off-the-shelf software does not always fit',

                'text' => 'Generic software can force your team to change established workflows or pay for functionality you do not need. Custom software gives you greater control over how your business operates.',

                'points' => [
                    'Manual repetitive processes',
                    'Disconnected business systems',
                    'Spreadsheet-dependent workflows',
                    'Software that cannot scale with the business',
                ],
            ],

            'solution' => [
                'title' => 'Custom software designed around your workflow',

                'text' => 'We turn business requirements into practical software products that simplify operations, centralize information and support future growth.',

                'points' => [
                    'Business-specific functionality',
                    'Role-based access control',
                    'Automated workflows',
                    'Centralized business data',
                    'Third-party integrations',
                    'Scalable architecture',
                ],
            ],

            'capabilities' => [
                [
                    'title' => 'Business Management Software',
                    'text' => 'Centralize operational processes and information in one tailored platform.',
                    'icon' => 'briefcase',
                ],
                [
                    'title' => 'Workflow Automation',
                    'text' => 'Reduce repetitive manual work through intelligent business workflows.',
                    'icon' => 'workflow',
                ],
                [
                    'title' => 'Internal Platforms',
                    'text' => 'Create secure platforms for teams, departments and internal operations.',
                    'icon' => 'users',
                ],
                [
                    'title' => 'Custom Dashboards',
                    'text' => 'Turn business data into useful dashboards and actionable information.',
                    'icon' => 'chart',
                ],
                [
                    'title' => 'System Integration',
                    'text' => 'Connect software platforms and external services through reliable integrations.',
                    'icon' => 'link',
                ],
                [
                    'title' => 'Legacy Modernization',
                    'text' => 'Improve aging software systems without disrupting important business operations.',
                    'icon' => 'refresh',
                ],
            ],

            'process' => [
                [
                    'number' => '01',
                    'title' => 'Understand',
                    'text' => 'We analyze your current workflows, requirements and business challenges.',
                ],
                [
                    'number' => '02',
                    'title' => 'Architect',
                    'text' => 'We define the software architecture, modules, integrations and technical roadmap.',
                ],
                [
                    'number' => '03',
                    'title' => 'Build',
                    'text' => 'We develop the platform in structured stages so functionality can be tested continuously.',
                ],
                [
                    'number' => '04',
                    'title' => 'Validate',
                    'text' => 'We test functionality, security, usability and performance before launch.',
                ],
                [
                    'number' => '05',
                    'title' => 'Scale',
                    'text' => 'We provide ongoing improvements and support as your software evolves.',
                ],
            ],

            'technologies' => [
                'Laravel',
                'PHP',
                'JavaScript',
                'React',
                'Vue.js',
                'MySQL',
                'PostgreSQL',
                'REST API',
            ],

            'benefits' => [
                'Software tailored to your workflows',
                'Reduced manual processes',
                'Centralized business information',
                'Better operational visibility',
                'Scalable architecture',
                'Greater control over functionality',
            ],

            'related_pages' => [
                'web-application-development',
                'erp-crm-solutions',
                'api-development',
            ],

            'faqs' => [
                [
                    'question' => 'What is custom software development?',
                    'answer' => 'Custom software development means creating software specifically around a company’s workflows, requirements and business objectives rather than relying entirely on a generic product.',
                ],
                [
                    'question' => 'Can you integrate custom software with existing systems?',
                    'answer' => 'Yes. Custom software can be connected with existing applications, APIs, databases and third-party services where appropriate.',
                ],
                [
                    'question' => 'Can the software be expanded later?',
                    'answer' => 'Yes. We plan the architecture with future growth in mind so additional modules, users, integrations and functionality can be introduced as requirements evolve.',
                ],
            ],
        ],


        /*
        |--------------------------------------------------------------------------
        | 3. Web Application Development
        |--------------------------------------------------------------------------
        */

        'web-application-development' => [

            'slug' => 'web-application-development',

            'title' => 'Web Application Development',

            'eyebrow' => 'WEB APPLICATION DEVELOPMENT',

            'seo_title' => 'Web Application Development Company | Custom Web Apps | Areia Soft',

            'meta_description' => 'Areia Soft develops secure, scalable web applications for businesses that need more than a traditional website.',

            'keywords' => [
                'web application development',
                'web app development company',
                'custom web application',
                'web application development services',
                'business web applications',
            ],

            'hero_title' => 'Web applications that turn complex workflows into simple experiences.',

            'hero_description' => 'We build browser-based applications that help businesses manage operations, serve customers and deliver digital products without requiring users to install traditional software.',

            'hero_image' => 'assets/images/landing-pages/web-application-development.jpg',

            'primary_cta' => 'Build Your Web Application',
            'primary_cta_url' => 'contact',

            'secondary_cta' => 'Explore Solutions',
            'secondary_cta_url' => 'services',

            'trust_points' => [
                'Custom web applications',
                'Secure user authentication',
                'Scalable backend architecture',
                'API-driven development',
            ],

            'problem' => [
                'title' => 'Complex business processes need better tools',

                'text' => 'When teams rely on disconnected tools, spreadsheets and manual processes, important information becomes difficult to manage. A purpose-built web application can bring these workflows together.',

                'points' => [
                    'Disconnected systems',
                    'Manual data entry',
                    'Limited visibility',
                    'Poor collaboration between teams',
                ],
            ],

            'solution' => [
                'title' => 'One accessible platform for your workflow',

                'text' => 'We develop web applications that centralize functionality, data and user workflows in an accessible browser-based environment.',

                'points' => [
                    'Custom dashboards',
                    'User and role management',
                    'Business workflow automation',
                    'Secure data handling',
                    'API integrations',
                    'Responsive interfaces',
                ],
            ],

            'capabilities' => [
                [
                    'title' => 'Customer Portals',
                    'text' => 'Secure online spaces where customers can access information and services.',
                    'icon' => 'users',
                ],
                [
                    'title' => 'Business Portals',
                    'text' => 'Centralized platforms for internal teams, partners and business operations.',
                    'icon' => 'layout',
                ],
                [
                    'title' => 'SaaS Platforms',
                    'text' => 'Build subscription-based web products with scalable architecture.',
                    'icon' => 'cloud',
                ],
                [
                    'title' => 'Management Systems',
                    'text' => 'Custom systems for managing operational data and workflows.',
                    'icon' => 'settings',
                ],
                [
                    'title' => 'Dashboards',
                    'text' => 'Interactive dashboards that make important business information easier to understand.',
                    'icon' => 'chart',
                ],
                [
                    'title' => 'Online Platforms',
                    'text' => 'Purpose-built platforms designed around specific user journeys and business models.',
                    'icon' => 'globe',
                ],
            ],

            'process' => [
                [
                    'number' => '01',
                    'title' => 'Map',
                    'text' => 'We map users, workflows, requirements and system interactions.',
                ],
                [
                    'number' => '02',
                    'title' => 'Design',
                    'text' => 'We design interfaces and user journeys around real use cases.',
                ],
                [
                    'number' => '03',
                    'title' => 'Develop',
                    'text' => 'We build the application using a structured and scalable development approach.',
                ],
                [
                    'number' => '04',
                    'title' => 'Test',
                    'text' => 'We validate functionality, security, responsiveness and performance.',
                ],
                [
                    'number' => '05',
                    'title' => 'Launch',
                    'text' => 'We deploy the application and support its continued improvement.',
                ],
            ],

            'technologies' => [
                'Laravel',
                'PHP',
                'React',
                'Vue.js',
                'JavaScript',
                'MySQL',
                'PostgreSQL',
                'REST API',
            ],

            'benefits' => [
                'Accessible from modern browsers',
                'Centralized workflows',
                'Improved team collaboration',
                'Custom functionality',
                'Scalable architecture',
                'Integration-ready platform',
            ],

            'related_pages' => [
                'software-development',
                'ui-ux-design',
                'api-development',
            ],

            'faqs' => [
                [
                    'question' => 'What is a web application?',
                    'answer' => 'A web application is an interactive software application accessed through a web browser. Unlike a traditional informational website, it typically provides functionality, user accounts, data processing or business workflows.',
                ],
                [
                    'question' => 'Can a web application have different user roles?',
                    'answer' => 'Yes. Web applications can support different user roles and permissions based on how your organization operates.',
                ],
                [
                    'question' => 'Can you connect a web application to external APIs?',
                    'answer' => 'Yes. API integrations can connect the application with payment platforms, business systems, communication services and other external technologies.',
                ],
            ],
        ],


        /*
        |--------------------------------------------------------------------------
        | 4. Mobile App Development
        |--------------------------------------------------------------------------
        */

        'mobile-app-development' => [

            'slug' => 'mobile-app-development',

            'title' => 'Mobile App Development',

            'eyebrow' => 'MOBILE APP DEVELOPMENT',

            'seo_title' => 'Mobile App Development Company | iOS & Android Apps | Areia Soft',

            'meta_description' => 'Build reliable mobile applications for iOS and Android with Areia Soft. We create user-focused apps for businesses, startups and digital products.',

            'keywords' => [
                'mobile app development company',
                'mobile application development',
                'Android app development',
                'iOS app development',
                'custom mobile app development',
            ],

            'hero_title' => 'Mobile apps designed for the way people actually use them.',

            'hero_description' => 'We create mobile applications that combine intuitive interfaces, reliable functionality and scalable technology for modern digital products.',

            'hero_image' => 'assets/images/landing-pages/mobile-app-development.jpg',

            'primary_cta' => 'Start Your App Project',
            'primary_cta_url' => 'contact',

            'secondary_cta' => 'Explore Our Services',
            'secondary_cta_url' => 'services',

            'trust_points' => [
                'iOS and Android development',
                'User-focused interfaces',
                'API integrations',
                'Scalable mobile architecture',
            ],

            'problem' => [
                'title' => 'A mobile app has to work in the real world',

                'text' => 'Users expect mobile apps to be fast, intuitive and reliable. Poor navigation, slow performance or inconsistent experiences can quickly damage adoption.',

                'points' => [
                    'Complicated navigation',
                    'Poor mobile performance',
                    'Disconnected backend systems',
                    'Inconsistent user experience',
                ],
            ],

            'solution' => [
                'title' => 'A mobile experience users can understand',

                'text' => 'We design and develop mobile applications around real user journeys, business functionality and the technical requirements of modern devices.',

                'points' => [
                    'Intuitive mobile interfaces',
                    'Secure authentication',
                    'Push notifications',
                    'API connectivity',
                    'Scalable backend systems',
                    'App-ready architecture',
                ],
            ],

            'capabilities' => [
                [
                    'title' => 'Business Apps',
                    'text' => 'Mobile applications that help teams access important business functionality on the move.',
                    'icon' => 'briefcase',
                ],
                [
                    'title' => 'Customer Apps',
                    'text' => 'Engaging applications designed around customer-facing services and experiences.',
                    'icon' => 'users',
                ],
                [
                    'title' => 'On-Demand Apps',
                    'text' => 'Apps connecting customers, service providers and operational workflows.',
                    'icon' => 'zap',
                ],
                [
                    'title' => 'Mobile Commerce',
                    'text' => 'Mobile shopping experiences designed for convenient product discovery and purchasing.',
                    'icon' => 'shopping-cart',
                ],
                [
                    'title' => 'Productivity Apps',
                    'text' => 'Tools designed to help users manage information, tasks and workflows.',
                    'icon' => 'check',
                ],
                [
                    'title' => 'App Integrations',
                    'text' => 'Connect mobile experiences with APIs, payment systems and backend platforms.',
                    'icon' => 'link',
                ],
            ],

            'process' => [
                [
                    'number' => '01',
                    'title' => 'Research',
                    'text' => 'We understand the target users, business model and core app requirements.',
                ],
                [
                    'number' => '02',
                    'title' => 'Prototype',
                    'text' => 'We define key screens and user journeys before development begins.',
                ],
                [
                    'number' => '03',
                    'title' => 'Develop',
                    'text' => 'We build the mobile application and required backend services.',
                ],
                [
                    'number' => '04',
                    'title' => 'Test',
                    'text' => 'We test functionality, usability and compatibility across target devices.',
                ],
                [
                    'number' => '05',
                    'title' => 'Release',
                    'text' => 'We prepare the application for deployment and ongoing improvement.',
                ],
            ],

            'technologies' => [
                'Flutter',
                'React Native',
                'Android',
                'iOS',
                'Laravel',
                'PHP',
                'REST API',
                'Firebase',
            ],

            'benefits' => [
                'Better mobile user experience',
                'Cross-platform development options',
                'Secure application architecture',
                'Backend integration',
                'Scalable product foundation',
                'Ongoing improvement potential',
            ],

            'related_pages' => [
                'web-application-development',
                'software-development',
                'ui-ux-design',
            ],

            'faqs' => [
                [
                    'question' => 'Do you develop both Android and iOS apps?',
                    'answer' => 'Yes. Mobile projects can be developed for Android, iOS or both platforms depending on the product requirements and chosen technology.',
                ],
                [
                    'question' => 'Can the app connect to an existing website or software?',
                    'answer' => 'Yes. Mobile applications can connect to existing backend systems and services through APIs.',
                ],
                [
                    'question' => 'Can you maintain the app after launch?',
                    'answer' => 'Yes. Mobile products often require ongoing updates, improvements, compatibility work and technical maintenance after launch.',
                ],
            ],
        ],


        /*
        |--------------------------------------------------------------------------
        | 5. ERP & CRM Solutions
        |--------------------------------------------------------------------------
        */

        'erp-crm-solutions' => [

            'slug' => 'erp-crm-solutions',

            'title' => 'ERP & CRM Solutions',

            'eyebrow' => 'ERP & CRM SOLUTIONS',

            'seo_title' => 'ERP & CRM Solutions | Custom Business Management Software | Areia Soft',

            'meta_description' => 'Areia Soft develops customized ERP and CRM solutions to centralize business operations, customer data, workflows and reporting.',

            'keywords' => [
                'ERP solutions',
                'CRM solutions',
                'custom ERP software',
                'custom CRM development',
                'ERP CRM development',
            ],

            'hero_title' => 'Bring your business operations and customer data together.',

            'hero_description' => 'We develop ERP and CRM solutions that help businesses centralize information, streamline workflows and gain better visibility across operations.',

            'hero_image' => 'assets/images/landing-pages/erp-crm-solutions.jpg',

            'primary_cta' => 'Discuss Your ERP or CRM',
            'primary_cta_url' => 'contact',

            'secondary_cta' => 'Explore Business Solutions',
            'secondary_cta_url' => 'services',

            'trust_points' => [
                'Custom ERP systems',
                'CRM platforms',
                'Business workflow automation',
                'Reporting and dashboards',
            ],

            'problem' => [
                'title' => 'Business information should not live everywhere',

                'text' => 'When sales, finance, operations and customer information are spread across different systems, teams spend more time searching for information and less time acting on it.',

                'points' => [
                    'Scattered customer information',
                    'Manual reporting',
                    'Disconnected departments',
                    'Duplicate data entry',
                ],
            ],

            'solution' => [
                'title' => 'One connected view of your business',

                'text' => 'We build ERP and CRM systems around your operational processes so teams can work from centralized information and consistent workflows.',

                'points' => [
                    'Customer management',
                    'Sales pipeline tracking',
                    'Inventory management',
                    'Staff and role management',
                    'Reports and dashboards',
                    'Workflow automation',
                ],
            ],

            'capabilities' => [
                [
                    'title' => 'CRM Development',
                    'text' => 'Manage leads, customers, communication and sales activities in one system.',
                    'icon' => 'users',
                ],
                [
                    'title' => 'ERP Development',
                    'text' => 'Connect core business processes through a centralized management platform.',
                    'icon' => 'grid',
                ],
                [
                    'title' => 'Sales Management',
                    'text' => 'Track leads, opportunities, customers and sales activities.',
                    'icon' => 'trending-up',
                ],
                [
                    'title' => 'Inventory Management',
                    'text' => 'Improve visibility over products, stock and inventory workflows.',
                    'icon' => 'package',
                ],
                [
                    'title' => 'Reporting',
                    'text' => 'Create dashboards and reports that turn operational data into useful insight.',
                    'icon' => 'chart',
                ],
                [
                    'title' => 'Automation',
                    'text' => 'Reduce repetitive administrative tasks through connected workflows.',
                    'icon' => 'zap',
                ],
            ],

            'process' => [
                [
                    'number' => '01',
                    'title' => 'Analyze',
                    'text' => 'We study your departments, workflows, data and reporting requirements.',
                ],
                [
                    'number' => '02',
                    'title' => 'Structure',
                    'text' => 'We organize modules, roles, data relationships and workflows.',
                ],
                [
                    'number' => '03',
                    'title' => 'Develop',
                    'text' => 'We build the ERP or CRM platform in manageable development stages.',
                ],
                [
                    'number' => '04',
                    'title' => 'Integrate',
                    'text' => 'We connect relevant third-party services and existing business systems.',
                ],
                [
                    'number' => '05',
                    'title' => 'Improve',
                    'text' => 'We continue improving the platform as your business requirements change.',
                ],
            ],

            'technologies' => [
                'Laravel',
                'PHP',
                'MySQL',
                'PostgreSQL',
                'JavaScript',
                'React',
                'REST API',
            ],

            'benefits' => [
                'Centralized business data',
                'Improved operational visibility',
                'Reduced manual work',
                'Better customer management',
                'Custom business workflows',
                'Actionable reporting',
            ],

            'related_pages' => [
                'software-development',
                'web-application-development',
                'api-development',
            ],

            'faqs' => [
                [
                    'question' => 'Can an ERP or CRM be customized for our business?',
                    'answer' => 'Yes. Custom ERP and CRM systems can be designed around your specific workflows, roles, data and reporting requirements.',
                ],
                [
                    'question' => 'Can you migrate data from an existing system?',
                    'answer' => 'Data migration can be planned as part of the project when the existing system and data structure support a reliable migration process.',
                ],
                [
                    'question' => 'Can ERP and CRM systems be integrated?',
                    'answer' => 'Yes. ERP and CRM functionality can be connected when the business requires shared customer, sales, operational or reporting data.',
                ],
            ],
        ],


        /*
        |--------------------------------------------------------------------------
        | 6. eCommerce Development
        |--------------------------------------------------------------------------
        */

        'ecommerce-development' => [

            'slug' => 'ecommerce-development',

            'title' => 'eCommerce Development',

            'eyebrow' => 'ECOMMERCE DEVELOPMENT',

            'seo_title' => 'eCommerce Development Company | Custom Online Stores | Areia Soft',

            'meta_description' => 'Areia Soft develops scalable eCommerce websites and online stores with product management, payments, orders and customer-focused shopping experiences.',

            'keywords' => [
                'ecommerce development company',
                'ecommerce website development',
                'online store development',
                'custom ecommerce development',
                'ecommerce solutions',
            ],

            'hero_title' => 'eCommerce experiences designed to make buying easier.',

            'hero_description' => 'We build online stores that make product discovery, checkout, order management and customer interactions easier to manage.',

            'hero_image' => 'assets/images/landing-pages/ecommerce-development.jpg',

            'primary_cta' => 'Build Your Online Store',
            'primary_cta_url' => 'contact',

            'secondary_cta' => 'Explore eCommerce Solutions',
            'secondary_cta_url' => 'services',

            'trust_points' => [
                'Custom online stores',
                'Product and inventory management',
                'Payment integrations',
                'Order management',
            ],

            'problem' => [
                'title' => 'Selling online involves more than product pages',

                'text' => 'A successful store needs a smooth journey from product discovery to checkout and fulfillment. Poor navigation, slow pages and complicated checkout can create unnecessary friction.',

                'points' => [
                    'Difficult product discovery',
                    'Complicated checkout',
                    'Manual order management',
                    'Disconnected inventory systems',
                ],
            ],

            'solution' => [
                'title' => 'An online store built around the customer journey',

                'text' => 'We create eCommerce platforms with clear product structures, intuitive shopping experiences and backend functionality for managing orders and products.',

                'points' => [
                    'Product catalogs',
                    'Shopping carts',
                    'Secure payment integration',
                    'Order management',
                    'Inventory management',
                    'Customer accounts',
                ],
            ],

            'capabilities' => [
                [
                    'title' => 'Custom Online Stores',
                    'text' => 'Build a store around your products, customers and business model.',
                    'icon' => 'shopping-cart',
                ],
                [
                    'title' => 'Product Management',
                    'text' => 'Manage products, categories, pricing and product information.',
                    'icon' => 'package',
                ],
                [
                    'title' => 'Payment Integration',
                    'text' => 'Connect your store with suitable online payment services.',
                    'icon' => 'credit-card',
                ],
                [
                    'title' => 'Order Management',
                    'text' => 'Manage customer orders and fulfillment workflows efficiently.',
                    'icon' => 'clipboard',
                ],
                [
                    'title' => 'Inventory Systems',
                    'text' => 'Connect products and stock information with operational workflows.',
                    'icon' => 'database',
                ],
                [
                    'title' => 'Customer Accounts',
                    'text' => 'Provide customers with secure accounts and order information.',
                    'icon' => 'user',
                ],
            ],

            'process' => [
                [
                    'number' => '01',
                    'title' => 'Plan',
                    'text' => 'We define products, customers, purchasing flows and operational requirements.',
                ],
                [
                    'number' => '02',
                    'title' => 'Structure',
                    'text' => 'We create the product architecture, navigation and conversion paths.',
                ],
                [
                    'number' => '03',
                    'title' => 'Develop',
                    'text' => 'We build the storefront and supporting management functionality.',
                ],
                [
                    'number' => '04',
                    'title' => 'Integrate',
                    'text' => 'We connect payments, APIs and other required business services.',
                ],
                [
                    'number' => '05',
                    'title' => 'Launch',
                    'text' => 'We test the purchasing experience and prepare the store for launch.',
                ],
            ],

            'technologies' => [
                'Laravel',
                'PHP',
                'MySQL',
                'JavaScript',
                'React',
                'REST API',
                'Payment APIs',
            ],

            'benefits' => [
                'Better shopping experience',
                'Flexible product management',
                'Streamlined order workflows',
                'Payment integration',
                'Scalable store architecture',
                'Mobile-friendly shopping',
            ],

            'related_pages' => [
                'website-development',
                'software-development',
                'api-development',
            ],

            'faqs' => [
                [
                    'question' => 'Can you build a custom eCommerce website?',
                    'answer' => 'Yes. We can build an online store around your product structure, customer journey, operational requirements and required integrations.',
                ],
                [
                    'question' => 'Can an eCommerce store integrate with payment services?',
                    'answer' => 'Yes. Payment integrations can be implemented based on the payment providers and requirements of the project.',
                ],
                [
                    'question' => 'Can the store support inventory management?',
                    'answer' => 'Yes. Inventory functionality can be included or connected to an existing inventory or business management system.',
                ],
            ],
        ],


        /*
        |--------------------------------------------------------------------------
        | 7. UI/UX Design
        |--------------------------------------------------------------------------
        */

        'ui-ux-design' => [

            'slug' => 'ui-ux-design',

            'title' => 'UI/UX Design',

            'eyebrow' => 'UI/UX DESIGN',

            'seo_title' => 'UI/UX Design Services | Website & App UX Design | Areia Soft',

            'meta_description' => 'Create intuitive digital experiences with UI/UX design services from Areia Soft. We design websites, web applications and mobile products around real users.',

            'keywords' => [
                'UI UX design services',
                'UI UX design company',
                'website UX design',
                'mobile app UX design',
                'user interface design',
            ],

            'hero_title' => 'Interfaces that make complex products feel simple.',

            'hero_description' => 'We design intuitive digital experiences that help users understand, navigate and interact with websites, applications and digital products.',

            'hero_image' => 'assets/images/landing-pages/ui-ux-design.jpg',

            'primary_cta' => 'Improve Your Product Experience',
            'primary_cta_url' => 'contact',

            'secondary_cta' => 'View Our Services',
            'secondary_cta_url' => 'services',

            'trust_points' => [
                'User-focused design',
                'Responsive interfaces',
                'Design systems',
                'Prototype-driven validation',
            ],

            'problem' => [
                'title' => 'Good technology can still feel difficult to use',

                'text' => 'Users do not see your backend architecture. They experience navigation, content, interactions and visual hierarchy. Poor UX can make even a powerful product frustrating.',

                'points' => [
                    'Confusing navigation',
                    'Unclear user journeys',
                    'Inconsistent interface patterns',
                    'Poor mobile usability',
                ],
            ],

            'solution' => [
                'title' => 'Design based on how people actually interact',

                'text' => 'We combine information architecture, interaction design and visual design to create experiences that are easier to understand and use.',

                'points' => [
                    'User journey mapping',
                    'Wireframes',
                    'Interactive prototypes',
                    'Responsive interface design',
                    'Design systems',
                    'Developer-ready specifications',
                ],
            ],

            'capabilities' => [
                [
                    'title' => 'Website UX',
                    'text' => 'Improve navigation, information hierarchy and conversion paths across websites.',
                    'icon' => 'globe',
                ],
                [
                    'title' => 'App UX',
                    'text' => 'Design clear mobile experiences around real user tasks and journeys.',
                    'icon' => 'smartphone',
                ],
                [
                    'title' => 'Web App UX',
                    'text' => 'Simplify complex application workflows through structured interface design.',
                    'icon' => 'layout',
                ],
                [
                    'title' => 'Wireframing',
                    'text' => 'Define page and screen structures before visual design and development.',
                    'icon' => 'layers',
                ],
                [
                    'title' => 'Prototyping',
                    'text' => 'Create interactive prototypes to validate ideas and user flows.',
                    'icon' => 'mouse-pointer',
                ],
                [
                    'title' => 'Design Systems',
                    'text' => 'Create reusable interface patterns for consistent digital products.',
                    'icon' => 'grid',
                ],
            ],

            'process' => [
                [
                    'number' => '01',
                    'title' => 'Understand',
                    'text' => 'We learn about the product, users, goals and existing experience.',
                ],
                [
                    'number' => '02',
                    'title' => 'Map',
                    'text' => 'We organize information and define key user journeys.',
                ],
                [
                    'number' => '03',
                    'title' => 'Prototype',
                    'text' => 'We create wireframes and interactive concepts to test the experience.',
                ],
                [
                    'number' => '04',
                    'title' => 'Design',
                    'text' => 'We develop the visual interface and reusable design patterns.',
                ],
                [
                    'number' => '05',
                    'title' => 'Deliver',
                    'text' => 'We provide development-ready designs and support implementation.',
                ],
            ],

            'technologies' => [
                'Figma',
                'Adobe XD',
                'HTML5',
                'CSS3',
                'JavaScript',
                'Tailwind CSS',
            ],

            'benefits' => [
                'Clearer user journeys',
                'Improved usability',
                'Consistent interfaces',
                'Better mobile experiences',
                'Reduced development ambiguity',
                'Stronger product experience',
            ],

            'related_pages' => [
                'website-development',
                'web-application-development',
                'mobile-app-development',
            ],

            'faqs' => [
                [
                    'question' => 'What is the difference between UI and UX design?',
                    'answer' => 'UX focuses on how users navigate and experience a product, while UI focuses more heavily on the visual interface and interactive presentation.',
                ],
                [
                    'question' => 'Can you redesign an existing application?',
                    'answer' => 'Yes. We can review an existing product and redesign its information architecture, user flows and interface where improvements are needed.',
                ],
                [
                    'question' => 'Do you provide designs for developers?',
                    'answer' => 'Yes. Designs can be structured and documented so developers have clear visual and interaction specifications during implementation.',
                ],
            ],
        ],


        /*
        |--------------------------------------------------------------------------
        | 8. AI & Automation Solutions
        |--------------------------------------------------------------------------
        */

        'ai-automation-solutions' => [

            'slug' => 'ai-automation-solutions',

            'title' => 'AI & Automation Solutions',

            'eyebrow' => 'AI & AUTOMATION',

            'seo_title' => 'AI & Automation Solutions | Business Process Automation | Areia Soft',

            'meta_description' => 'Use AI and automation to reduce repetitive work, improve business workflows and connect intelligent tools with your existing systems.',

            'keywords' => [
                'AI automation solutions',
                'business process automation',
                'AI development services',
                'AI integration',
                'workflow automation',
            ],

            'hero_title' => 'Turn repetitive work into intelligent workflows.',

            'hero_description' => 'We help businesses identify practical automation opportunities and connect AI-powered capabilities with existing applications and workflows.',

            'hero_image' => 'assets/images/landing-pages/ai-automation-solutions.jpg',

            'primary_cta' => 'Explore AI Opportunities',
            'primary_cta_url' => 'contact',

            'secondary_cta' => 'Explore Our Services',
            'secondary_cta_url' => 'services',

            'trust_points' => [
                'Business workflow automation',
                'AI integrations',
                'API-based solutions',
                'Custom automation systems',
            ],

            'problem' => [
                'title' => 'Your team should not spend hours on repetitive work',

                'text' => 'Manual data processing, repetitive communication and disconnected systems can consume valuable time. Automation can help teams focus on higher-value work.',

                'points' => [
                    'Repetitive administrative tasks',
                    'Manual data processing',
                    'Disconnected applications',
                    'Slow information retrieval',
                ],
            ],

            'solution' => [
                'title' => 'Practical automation built around your workflow',

                'text' => 'We identify useful opportunities for automation and integrate intelligent functionality into existing business processes instead of adding unnecessary complexity.',

                'points' => [
                    'Workflow automation',
                    'AI-assisted processing',
                    'Intelligent search',
                    'Document processing',
                    'API integrations',
                    'Automated notifications',
                ],
            ],

            'capabilities' => [
                [
                    'title' => 'Workflow Automation',
                    'text' => 'Automate repetitive steps across business processes and applications.',
                    'icon' => 'workflow',
                ],
                [
                    'title' => 'AI Integration',
                    'text' => 'Connect AI capabilities with applications and business workflows.',
                    'icon' => 'cpu',
                ],
                [
                    'title' => 'Document Processing',
                    'text' => 'Reduce manual document handling and information extraction.',
                    'icon' => 'file-text',
                ],
                [
                    'title' => 'Intelligent Search',
                    'text' => 'Help teams find useful information faster across business data.',
                    'icon' => 'search',
                ],
                [
                    'title' => 'Business Automation',
                    'text' => 'Connect systems and automate recurring operational tasks.',
                    'icon' => 'zap',
                ],
                [
                    'title' => 'AI-Powered Features',
                    'text' => 'Add practical intelligent capabilities to existing digital products.',
                    'icon' => 'sparkles',
                ],
            ],

            'process' => [
                [
                    'number' => '01',
                    'title' => 'Identify',
                    'text' => 'We identify repetitive processes and practical automation opportunities.',
                ],
                [
                    'number' => '02',
                    'title' => 'Evaluate',
                    'text' => 'We determine where automation or AI can provide meaningful value.',
                ],
                [
                    'number' => '03',
                    'title' => 'Integrate',
                    'text' => 'We connect the solution with your existing systems and workflows.',
                ],
                [
                    'number' => '04',
                    'title' => 'Validate',
                    'text' => 'We test the workflow and verify that it behaves reliably.',
                ],
                [
                    'number' => '05',
                    'title' => 'Optimize',
                    'text' => 'We refine the automation as your team uses and learns from it.',
                ],
            ],

            'technologies' => [
                'PHP',
                'Laravel',
                'Python',
                'JavaScript',
                'REST API',
                'AI APIs',
                'MySQL',
            ],

            'benefits' => [
                'Less repetitive manual work',
                'Faster business processes',
                'Connected systems',
                'Improved information access',
                'Scalable automation',
                'More efficient teams',
            ],

            'related_pages' => [
                'software-development',
                'api-development',
                'cloud-devops-solutions',
            ],

            'faqs' => [
                [
                    'question' => 'What business processes can be automated?',
                    'answer' => 'Potential opportunities include repetitive data processing, notifications, document workflows, system synchronization and other structured tasks. The right opportunities depend on your existing workflow.',
                ],
                [
                    'question' => 'Can AI be integrated into existing software?',
                    'answer' => 'Yes. AI capabilities can often be integrated into existing applications through APIs and supporting backend functionality.',
                ],
                [
                    'question' => 'Do I need to replace my existing software?',
                    'answer' => 'Not necessarily. Many automation projects are designed to work alongside existing applications and connect them through APIs or other integration methods.',
                ],
            ],
        ],


        /*
        |--------------------------------------------------------------------------
        | 9. Cloud & DevOps Solutions
        |--------------------------------------------------------------------------
        */

        'cloud-devops-solutions' => [

            'slug' => 'cloud-devops-solutions',

            'title' => 'Cloud & DevOps Solutions',

            'eyebrow' => 'CLOUD & DEVOPS',

            'seo_title' => 'Cloud & DevOps Solutions | Scalable Cloud Infrastructure | Areia Soft',

            'meta_description' => 'Improve application deployment, infrastructure reliability and scalability with cloud and DevOps solutions from Areia Soft.',

            'keywords' => [
                'cloud solutions',
                'DevOps services',
                'cloud infrastructure',
                'DevOps consulting',
                'application deployment',
            ],

            'hero_title' => 'Infrastructure designed to keep your applications moving.',

            'hero_description' => 'We help businesses build, deploy and maintain reliable application infrastructure with practical cloud and DevOps practices.',

            'hero_image' => 'assets/images/landing-pages/cloud-devops-solutions.jpg',

            'primary_cta' => 'Discuss Your Infrastructure',
            'primary_cta_url' => 'contact',

            'secondary_cta' => 'Explore Our Services',
            'secondary_cta_url' => 'services',

            'trust_points' => [
                'Cloud infrastructure',
                'Deployment automation',
                'Application monitoring',
                'Scalable environments',
            ],

            'problem' => [
                'title' => 'Growing applications need reliable infrastructure',

                'text' => 'As applications grow, manual deployments and poorly structured infrastructure can create reliability and scaling problems.',

                'points' => [
                    'Manual deployments',
                    'Unclear infrastructure',
                    'Unexpected downtime',
                    'Limited monitoring',
                ],
            ],

            'solution' => [
                'title' => 'A more reliable path from development to production',

                'text' => 'We improve deployment processes and infrastructure so applications can be released, monitored and scaled more efficiently.',

                'points' => [
                    'Cloud deployment',
                    'CI/CD pipelines',
                    'Server configuration',
                    'Application monitoring',
                    'Backup strategies',
                    'Infrastructure optimization',
                ],
            ],

            'capabilities' => [
                [
                    'title' => 'Cloud Deployment',
                    'text' => 'Deploy applications to suitable cloud environments with structured configurations.',
                    'icon' => 'cloud',
                ],
                [
                    'title' => 'CI/CD',
                    'text' => 'Automate application testing and deployment workflows.',
                    'icon' => 'repeat',
                ],
                [
                    'title' => 'Infrastructure',
                    'text' => 'Build and organize infrastructure around application requirements.',
                    'icon' => 'server',
                ],
                [
                    'title' => 'Monitoring',
                    'text' => 'Improve visibility into application and infrastructure performance.',
                    'icon' => 'activity',
                ],
                [
                    'title' => 'Backups',
                    'text' => 'Implement practical backup and recovery strategies.',
                    'icon' => 'database',
                ],
                [
                    'title' => 'Optimization',
                    'text' => 'Review infrastructure and deployment processes for improvement opportunities.',
                    'icon' => 'trending-up',
                ],
            ],

            'process' => [
                [
                    'number' => '01',
                    'title' => 'Assess',
                    'text' => 'We review the current application, hosting environment and deployment workflow.',
                ],
                [
                    'number' => '02',
                    'title' => 'Plan',
                    'text' => 'We define an infrastructure and deployment strategy around the application.',
                ],
                [
                    'number' => '03',
                    'title' => 'Configure',
                    'text' => 'We implement the required environments, services and deployment processes.',
                ],
                [
                    'number' => '04',
                    'title' => 'Monitor',
                    'text' => 'We establish appropriate monitoring and operational visibility.',
                ],
                [
                    'number' => '05',
                    'title' => 'Optimize',
                    'text' => 'We refine infrastructure as application usage and requirements grow.',
                ],
            ],

            'technologies' => [
                'AWS',
                'DigitalOcean',
                'Linux',
                'Docker',
                'Git',
                'GitHub Actions',
                'Nginx',
            ],

            'benefits' => [
                'More consistent deployments',
                'Improved infrastructure visibility',
                'Better scalability',
                'Reduced manual deployment work',
                'Improved application reliability',
                'Practical cloud architecture',
            ],

            'related_pages' => [
                'software-development',
                'web-application-development',
                'software-maintenance',
            ],

            'faqs' => [
                [
                    'question' => 'What is DevOps?',
                    'answer' => 'DevOps is a set of development and operational practices that help teams build, test, deploy and maintain applications more efficiently and reliably.',
                ],
                [
                    'question' => 'Can you migrate an existing application to the cloud?',
                    'answer' => 'Cloud migration can be planned for suitable applications after reviewing the existing architecture, hosting environment and operational requirements.',
                ],
                [
                    'question' => 'Do you provide ongoing infrastructure support?',
                    'answer' => 'Yes. Infrastructure can require ongoing monitoring, optimization, security updates and operational support after deployment.',
                ],
            ],
        ],


        /*
        |--------------------------------------------------------------------------
        | 10. API Development
        |--------------------------------------------------------------------------
        */

        'api-development' => [

            'slug' => 'api-development',

            'title' => 'API Development & Integration',

            'eyebrow' => 'API DEVELOPMENT & INTEGRATION',

            'seo_title' => 'API Development Company | API Integration Services | Areia Soft',

            'meta_description' => 'Areia Soft develops and integrates APIs that connect websites, applications, mobile apps and third-party business systems.',

            'keywords' => [
                'API development company',
                'API development services',
                'API integration services',
                'REST API development',
                'custom API development',
            ],

            'hero_title' => 'Connect the systems your business depends on.',

            'hero_description' => 'We develop and integrate APIs that allow applications, websites, mobile apps and external platforms to exchange data reliably.',

            'hero_image' => 'assets/images/landing-pages/api-development.jpg',

            'primary_cta' => 'Discuss Your API Project',
            'primary_cta_url' => 'contact',

            'secondary_cta' => 'Explore Development Services',
            'secondary_cta_url' => 'services',

            'trust_points' => [
                'REST API development',
                'Third-party integrations',
                'Secure authentication',
                'System-to-system connectivity',
            ],

            'problem' => [
                'title' => 'Disconnected systems create unnecessary work',

                'text' => 'When applications cannot communicate effectively, teams may need to enter the same information multiple times or maintain inefficient manual processes.',

                'points' => [
                    'Disconnected applications',
                    'Duplicate data entry',
                    'Manual synchronization',
                    'Limited access to business data',
                ],
            ],

            'solution' => [
                'title' => 'A reliable connection between your systems',

                'text' => 'We design APIs and integrations that allow different platforms to communicate while keeping data flows structured and manageable.',

                'points' => [
                    'RESTful API development',
                    'Third-party API integration',
                    'Authentication and authorization',
                    'Data synchronization',
                    'Webhook integration',
                    'API documentation',
                ],
            ],

            'capabilities' => [
                [
                    'title' => 'Custom REST APIs',
                    'text' => 'Build APIs for websites, applications and business systems.',
                    'icon' => 'code',
                ],
                [
                    'title' => 'Third-Party Integration',
                    'text' => 'Connect applications with external services and platforms.',
                    'icon' => 'link',
                ],
                [
                    'title' => 'Payment APIs',
                    'text' => 'Connect applications with suitable payment and transaction services.',
                    'icon' => 'credit-card',
                ],
                [
                    'title' => 'Data Synchronization',
                    'text' => 'Move and synchronize information between connected systems.',
                    'icon' => 'refresh',
                ],
                [
                    'title' => 'Authentication',
                    'text' => 'Implement appropriate authentication and authorization mechanisms.',
                    'icon' => 'lock',
                ],
                [
                    'title' => 'API Documentation',
                    'text' => 'Document endpoints and integration requirements for maintainability.',
                    'icon' => 'file-text',
                ],
            ],

            'process' => [
                [
                    'number' => '01',
                    'title' => 'Analyze',
                    'text' => 'We review the systems, data and integration requirements.',
                ],
                [
                    'number' => '02',
                    'title' => 'Design',
                    'text' => 'We define endpoints, data structures, authentication and communication flows.',
                ],
                [
                    'number' => '03',
                    'title' => 'Develop',
                    'text' => 'We build or implement the required API functionality.',
                ],
                [
                    'number' => '04',
                    'title' => 'Integrate',
                    'text' => 'We connect the API with the required applications and services.',
                ],
                [
                    'number' => '05',
                    'title' => 'Test',
                    'text' => 'We validate requests, responses, security and integration behavior.',
                ],
            ],

            'technologies' => [
                'Laravel',
                'PHP',
                'REST API',
                'JSON',
                'MySQL',
                'PostgreSQL',
                'OAuth',
                'JavaScript',
            ],

            'benefits' => [
                'Connected business systems',
                'Reduced manual data entry',
                'Reusable integrations',
                'Structured data exchange',
                'Better application interoperability',
                'Scalable integration architecture',
            ],

            'related_pages' => [
                'software-development',
                'web-application-development',
                'mobile-app-development',
            ],

            'faqs' => [
                [
                    'question' => 'What is API development?',
                    'answer' => 'API development involves creating interfaces that allow software systems to communicate and exchange structured data.',
                ],
                [
                    'question' => 'Can you integrate third-party APIs?',
                    'answer' => 'Yes. We can integrate suitable third-party APIs into websites, web applications, mobile applications and custom software.',
                ],
                [
                    'question' => 'Can an API connect multiple applications?',
                    'answer' => 'Yes. APIs can act as a structured communication layer between multiple applications and services when the architecture supports it.',
                ],
            ],
        ],

    ],

];
