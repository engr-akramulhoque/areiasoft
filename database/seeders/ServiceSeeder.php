<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        $services = [
            [
                'title' => 'Website Development',
                'slug' => 'website-development',
                'category' => 'Web Development',
                'description' => 'Professional website development for businesses that need a fast, responsive, secure, and search-friendly online presence.',
                'hero_description' => 'Areia Soft builds custom business websites that communicate your value clearly, work smoothly across devices, and provide a strong technical foundation for search visibility and lead generation.',
                'image' => 'uploads/services/website-development.webp',
                'alt_text' => 'Responsive website development services by Areia Soft',
                'overview' => 'Your website often creates the first impression of your business. Areia Soft delivers tailored website development for companies, startups, service providers, and organizations. From corporate websites and landing pages to content-managed websites, we focus on clear information architecture, accessible interfaces, responsive layouts, reliable performance, and technical SEO foundations. Each project is planned around your audience, goals, and future growth.',
                
                'seo_content' => <<<'HTML'
                    <h2>Professional Website Development Services</h2>
                    <p>Areia Soft provides professional website development services for businesses, startups, and organizations looking to build a strong online presence. We develop responsive, user-friendly websites designed around your business goals, target audience, and brand identity.</p>
                    <h2>Custom Websites for Your Business</h2>
                    <p>From corporate websites and business landing pages to content-managed websites, our website development solutions focus on usability, mobile responsiveness, maintainability, and reliable performance. We structure website content to help visitors find information and understand your services.</p>
                    <h2>Responsive Design and Technical SEO</h2>
                    <p>Our website development process considers mobile usability, semantic HTML, clean navigation, page performance, accessible interfaces, and search engine optimization fundamentals. These practices help create a strong technical foundation for search visibility, although rankings depend on many factors beyond website development alone.</p>
                    <h2>Website Development for Growing Businesses</h2>
                    <p>Whether you need a new business website or an improvement to an existing site, Areia Soft can help plan a solution that supports your brand, communicates your value, and provides room for future growth.</p>
                    <h2>Start Your Website Project</h2>
                    <p>Contact Areia Soft to discuss your website requirements, preferred features, budget, and business objectives. We will help you identify a practical website development approach for your needs.</p>
                HTML,

                'metrics' => [
                    ['number' => '100%', 'label' => 'Responsive Layouts'],
                    ['number' => 'SEO', 'label' => 'Friendly Structure'],
                    ['number' => 'Fast', 'label' => 'Performance Focus'],
                    ['number' => 'Secure', 'label' => 'Build Practices'],
                ],
                'features' => [
                    'Custom business website design and development',
                    'Responsive layouts for mobile, tablet, and desktop',
                    'Semantic HTML and search-friendly site architecture',
                    'Content management and editable website sections',
                    'Contact forms and lead-generation integrations',
                    'Analytics and tag-management integration',
                    'Performance, accessibility, and usability improvements',
                    'Deployment, technical setup, and launch support',
                ],
                'technologies' => ['HTML5', 'CSS3', 'JavaScript', 'Bootstrap', 'Laravel', 'PHP', 'MySQL', 'WordPress'],
                'benefits' => [
                    'Present a professional and consistent brand online',
                    'Make information easier for visitors to find',
                    'Create more opportunities to generate qualified leads',
                    'Improve usability across common screen sizes',
                    'Establish a maintainable foundation for future updates',
                ],
                'cta_title' => 'Build a Website That Works for Your Business',
                'cta_text' => 'Tell us about your business, audience, and goals. We will help plan a responsive website built around usability, performance, and growth.',
                'cta_button' => 'Start Your Website Project',
                'icon' => '<svg viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="14" rx="2"/><line x1="3" y1="8" x2="21" y2="8"/><circle cx="6" cy="6" r="0.8"/><circle cx="9" cy="6" r="0.8"/></svg>',
                'sort_order' => 1,
                'active' => true,
            ],
            [
                'title' => 'Custom Software Development',
                'slug' => 'custom-software-development',
                'category' => 'Software Development',
                'description' => 'Custom software development to automate business processes, connect data, and solve operational challenges with software tailored to your needs.',
                'hero_description' => 'Areia Soft develops business software around your workflows, users, and objectives—helping teams reduce repetitive work, improve visibility, and scale with confidence.',
                'image' => 'uploads/services/custom-software-development.webp',
                'alt_text' => 'Custom software development solutions by Areia Soft',
                'overview' => 'Off-the-shelf products do not always fit the way a business works. Our custom software development service turns specific requirements into maintainable applications, internal tools, and integrated business systems. We work from your process and user needs to plan the functionality, data model, permissions, integrations, and delivery approach. The result is software designed to support real operations rather than force your team into an unsuitable workflow.',
                
                'seo_content' => <<<'HTML'
                    <h2>Custom Software Development Services</h2>
                    <p>Areia Soft provides custom software development services for businesses that need software tailored to their operations, customers, and long-term objectives. We build business applications and internal tools designed to address specific requirements that standard software may not fully support.</p>
                    <h2>Business Software Built Around Your Workflow</h2>
                    <p>Our custom software solutions can support workflow automation, data management, reporting, employee operations, customer services, and business process improvement. We consider user roles, system architecture, database design, integrations, and maintainability when planning each application.</p>
                    <h2>Scalable and Maintainable Applications</h2>
                    <p>We use appropriate technologies and structured development practices to create software that can evolve as business needs change. Depending on the project, solutions may include web technologies, APIs, databases, dashboards, and third-party integrations.</p>
                    <h2>Improve Your Business Operations</h2>
                    <p>Custom software can help reduce repetitive tasks, organize business information, and make processes easier to manage. The right solution depends on your existing systems, requirements, and operational goals.</p>
                    <h2>Discuss Your Software Project</h2>
                    <p>Contact Areia Soft to explain your business challenges and the software functionality you need. We can help define the scope and plan a practical custom software solution.</p>
                HTML,

                'metrics' => [
                    ['number' => 'Custom', 'label' => 'Built for Your Needs'],
                    ['number' => 'Scale', 'label' => 'Ready Architecture'],
                    ['number' => 'Secure', 'label' => 'Access Controls'],
                    ['number' => 'API', 'label' => 'Integration Options'],
                ],
                'features' => [
                    'Custom business software and internal tools',
                    'Workflow and process automation',
                    'Role-based access and permissions',
                    'Business dashboards and reporting',
                    'Third-party API and platform integrations',
                    'Database planning and optimization',
                    'Scalable application architecture',
                    'Maintenance and iterative improvements',
                ],
                'technologies' => ['Laravel', 'PHP', 'JavaScript', 'React', 'Vue.js', 'Node.js', 'MySQL', 'PostgreSQL'],
                'benefits' => [
                    'Reduce repetitive manual tasks',
                    'Align software with your actual business processes',
                    'Improve access to operational information',
                    'Connect teams and systems through shared data',
                    'Extend functionality as business requirements change',
                ],
                'cta_title' => 'Build Software Around Your Business',
                'cta_text' => 'Describe the process you want to improve. We can help define a practical custom software solution that fits your team and requirements.',
                'cta_button' => 'Discuss Your Software Project',
                'icon' => '<svg viewBox="0 0 24 24"><polyline points="8,8 4,12 8,16"/><polyline points="16,8 20,12 16,16"/><line x1="13" y1="5" x2="11" y2="19"/></svg>',
                'sort_order' => 2,
                'active' => true,
            ],
            [
                'title' => 'Web Application Development',
                'slug' => 'web-application-development',
                'category' => 'Web Application Development',
                'description' => 'Secure, scalable web application development for customer portals, SaaS products, dashboards, and data-driven business platforms.',
                'hero_description' => 'Areia Soft creates web applications that combine intuitive interfaces with dependable backend systems, helping businesses deliver useful online tools and digital services.',
                'image' => 'uploads/services/web-application-development.webp',
                'alt_text' => 'Custom web application development by Areia Soft',
                'overview' => 'When a standard website is not enough, a web application can help users complete tasks, manage information, and interact with your business online. Areia Soft builds custom web applications with attention to application structure, authentication, permissions, database design, APIs, and responsive user experiences. We plan for maintainability and future development so your application can evolve alongside your product and customers.',
                
                'seo_content' => <<<'HTML'
                    <h2>Web Application Development Services</h2>
                    <p>Areia Soft develops custom web applications for businesses, startups, and organizations that need interactive online platforms beyond a traditional website. Our solutions can support customer portals, administrative dashboards, SaaS products, business tools, and data-driven applications.</p>
                    <h2>Custom Web Applications for Business</h2>
                    <p>We build web applications around your users and workflows, with features such as account registration, authentication, role-based permissions, data management, reporting, and API integrations. Each project is planned according to its functionality, technical requirements, and intended users.</p>
                    <h2>Secure Architecture and Reliable Functionality</h2>
                    <p>Our development approach considers application structure, database organization, input validation, access controls, responsive interfaces, and maintainable code. We aim to create applications that are practical to operate and can be improved as requirements evolve.</p>
                    <h2>From Business Tools to SaaS Platforms</h2>
                    <p>Whether you need an internal management platform or a customer-facing digital product, Areia Soft can help transform your requirements into a structured web application plan.</p>
                    <h2>Build Your Web Application</h2>
                    <p>Contact Areia Soft to discuss your application idea, target users, required features, and integration needs.</p>
                HTML,

                'metrics' => [
                    ['number' => '24/7', 'label' => 'Browser Access'],
                    ['number' => 'Secure', 'label' => 'Application Design'],
                    ['number' => 'Scale', 'label' => 'Ready Structure'],
                    ['number' => 'API', 'label' => 'Connected Systems'],
                ],
                'features' => [
                    'Custom web application development',
                    'Customer, employee, and partner portals',
                    'Administrative dashboards and reporting',
                    'SaaS product development',
                    'Authentication and authorization workflows',
                    'REST API development and integration',
                    'Database-driven features and data management',
                    'Deployment, monitoring, and ongoing enhancements',
                ],
                'technologies' => ['Laravel', 'PHP', 'React', 'Vue.js', 'Node.js', 'MySQL', 'PostgreSQL', 'Redis'],
                'benefits' => [
                    'Move business processes into accessible digital tools',
                    'Give customers self-service functionality',
                    'Centralize information and workflows',
                    'Reduce reliance on disconnected spreadsheets',
                    'Create a foundation for new digital products',
                ],
                'cta_title' => 'Turn Your Idea Into a Web Application',
                'cta_text' => 'From internal business platforms to customer-facing applications, we can help plan and build a web solution around your users and goals.',
                'cta_button' => 'Build Your Web Application',
                'icon' => '<svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="9"/><ellipse cx="12" cy="12" rx="4" ry="9"/><line x1="3" y1="12" x2="21" y2="12"/></svg>',
                'sort_order' => 3,
                'active' => true,
            ],
            [
                'title' => 'Mobile App Development',
                'slug' => 'mobile-app-development',
                'category' => 'Mobile App Development',
                'description' => 'Mobile app development for Android and iOS, from cross-platform products to connected apps that support customer engagement and business workflows.',
                'hero_description' => 'Areia Soft helps turn mobile product ideas into practical Android and iOS applications with user-focused interfaces, reliable integrations, and room to grow.',
                'image' => 'uploads/services/mobile-app-development.webp',
                'alt_text' => 'Android and iOS mobile app development services by Areia Soft',
                'overview' => 'A mobile application can make your service more accessible and help customers interact with your business wherever they are. Areia Soft plans and develops mobile apps around the intended users, core features, platform requirements, and backend systems. We consider navigation, performance, account security, API communication, notifications, and maintainability to help deliver a consistent experience across supported devices.',
                
                'seo_content' => <<<'HTML'
                    <h2>Mobile App Development Services</h2>
                    <p>Areia Soft provides mobile app development services for businesses and startups planning Android and iOS applications. We help turn product ideas into mobile experiences that support customer engagement, digital services, and business workflows.</p>
                    <h2>Android and iOS Application Development</h2>
                    <p>Depending on your project requirements, we can plan native or cross-platform app development, user account functionality, backend connectivity, notifications, and other features needed to support your intended use case.</p>
                    <h2>User-Focused Mobile Experiences</h2>
                    <p>Successful mobile applications need intuitive navigation, responsive interactions, suitable performance, and dependable communication with backend systems. Our development approach considers usability, device compatibility, data handling, and maintainability.</p>
                    <h2>Connected Mobile Applications</h2>
                    <p>Mobile apps can integrate with websites, databases, business software, payment services, and APIs where appropriate. We help identify the features and integrations required to support your product goals.</p>
                    <h2>Discuss Your Mobile App Idea</h2>
                    <p>Contact Areia Soft with your app concept, target audience, platform requirements, and essential features so we can help plan your development project.</p>
                HTML,

                'metrics' => [
                    ['number' => 'iOS', 'label' => 'App Experiences'],
                    ['number' => 'Android', 'label' => 'App Experiences'],
                    ['number' => 'Cross', 'label' => 'Platform Options'],
                    ['number' => 'API', 'label' => 'Backend Connectivity'],
                ],
                'features' => [
                    'Android mobile application development',
                    'iOS mobile application development',
                    'Cross-platform application development',
                    'Backend and REST API integration',
                    'Push notifications and user messaging',
                    'User accounts and authentication',
                    'Payment gateway integration where required',
                    'Mobile usability and performance improvements',
                ],
                'technologies' => ['Flutter', 'React Native', 'Firebase', 'Node.js', 'Laravel', 'REST API', 'MySQL', 'MongoDB'],
                'benefits' => [
                    'Make services available through mobile devices',
                    'Create more convenient customer journeys',
                    'Support digital products and on-the-go workflows',
                    'Connect mobile experiences with existing systems',
                    'Improve the app as users and requirements evolve',
                ],
                'cta_title' => 'Bring Your Mobile App Idea to Life',
                'cta_text' => 'Share your app concept, target users, and essential features. We can help shape a clear development plan for your mobile product.',
                'cta_button' => 'Discuss Your App Project',
                'icon' => '<svg viewBox="0 0 24 24"><rect x="7" y="2.5" width="10" height="19" rx="2"/><line x1="10" y1="5" x2="14" y2="5"/><circle cx="12" cy="18" r="0.8"/></svg>',
                'sort_order' => 4,
                'active' => true,
            ],
            [
                'title' => 'ERP & CRM Solutions',
                'slug' => 'erp-crm-solutions',
                'category' => 'Business Software',
                'description' => 'Custom ERP and CRM solutions that connect business operations, organize customer information, and improve visibility across teams.',
                'hero_description' => 'Areia Soft builds and integrates ERP and CRM systems to help businesses manage customer relationships, sales activity, inventory, teams, and operational information in a more connected way.',
                'image' => 'uploads/services/erp-crm-solutions.webp',
                'alt_text' => 'Custom ERP and CRM business software solutions by Areia Soft',
                
                'seo_content' => <<<'HTML'
                    <h2>ERP and CRM Development Services</h2>
                    <p>Areia Soft provides ERP and CRM solutions to help businesses organize operational processes, manage customer relationships, and improve access to business information. We develop or integrate systems based on your organization's requirements and existing workflows.</p>
                    <h2>Custom ERP Solutions</h2>
                    <p>Enterprise resource planning systems can connect functions such as inventory management, purchasing, employee operations, reporting, and other business processes. We help identify the modules and integrations that make sense for your organization.</p>
                    <h2>CRM Systems for Customer Management</h2>
                    <p>Customer relationship management solutions can help teams organize customer records, track leads, manage sales pipelines, record interactions, and coordinate follow-up activities. A suitable CRM workflow makes customer information easier to manage across teams.</p>
                    <h2>Connected Business Operations</h2>
                    <p>Areia Soft focuses on practical system design, role-based access, data organization, dashboards, and integrations. The goal is to reduce disconnected processes and create a system aligned with your business needs.</p>
                    <h2>Discuss Your ERP or CRM Project</h2>
                    <p>Contact Areia Soft to explain your current workflows, operational challenges, reporting needs, and customer management requirements.</p>
                HTML,

                'overview' => 'Disconnected business tools can create duplicate work and make it difficult to understand what is happening across an organization. Areia Soft develops ERP and CRM solutions based on your operational requirements, including customer records, sales pipelines, inventory, employee workflows, reporting, and integrations. We focus on creating a practical shared system that helps teams access consistent information and manage processes more clearly.',
                'metrics' => [
                    ['number' => '360°', 'label' => 'Business Visibility'],
                    ['number' => 'One', 'label' => 'Connected Platform'],
                    ['number' => 'Smart', 'label' => 'Workflow Options'],
                    ['number' => 'Scale', 'label' => 'Ready Structure'],
                ],
                'features' => [
                    'Custom ERP system development',
                    'CRM and customer record management',
                    'Sales pipeline and lead tracking',
                    'Inventory and product management',
                    'Employee and HR workflow modules',
                    'Business reports and management dashboards',
                    'Data migration and third-party integrations',
                    'Role-based access and permissions',
                ],
                'technologies' => ['Laravel', 'PHP', 'MySQL', 'PostgreSQL', 'React', 'Vue.js', 'REST API', 'Docker'],
                'benefits' => [
                    'Bring important business information together',
                    'Reduce repeated data entry between systems',
                    'Support more consistent customer follow-up',
                    'Improve visibility into operational activity',
                    'Adapt workflows to your organization',
                ],
                'cta_title' => 'Connect Your Business With ERP or CRM',
                'cta_text' => 'Tell us which processes, teams, and reports you need to manage. We can help plan an ERP or CRM solution that fits your organization.',
                'cta_button' => 'Discuss ERP & CRM Needs',
                'icon' => '<svg viewBox="0 0 24 24"><rect x="3" y="4" width="7" height="7"/><rect x="14" y="4" width="7" height="7"/><rect x="8.5" y="14" width="7" height="7"/><line x1="10" y1="7.5" x2="14" y2="7.5"/><line x1="12" y1="11" x2="12" y2="14"/></svg>',
                'sort_order' => 5,
                'active' => true,
            ],
            [
                'title' => 'eCommerce Development',
                'slug' => 'ecommerce-development',
                'category' => 'eCommerce Development',
                'description' => 'eCommerce website development for online stores that need product management, smooth checkout, secure payment integrations, and room to scale.',
                'hero_description' => 'Areia Soft develops custom eCommerce websites and online stores that make it easier to showcase products, manage orders, accept payments, and deliver a smooth shopping experience.',
                'image' => 'uploads/services/ecommerce-development.webp',
                'alt_text' => 'eCommerce website and online store development by Areia Soft',
                'overview' => 'An effective online store needs more than attractive product pages. It needs clear categories, useful product information, a convenient checkout, dependable payment processing, and manageable order operations. Areia Soft develops eCommerce websites around your products, customers, and fulfillment needs, with attention to responsive design, product administration, inventory, integrations, and search-friendly page structure.',

                'seo_content' => <<<'HTML'
                    <h2>eCommerce Website Development Services</h2>
                    <p>Areia Soft develops eCommerce websites and online stores for businesses that want to sell products online. We create store solutions around your products, customers, order processes, and business objectives.</p>
                    <h2>Custom Online Store Development</h2>
                    <p>Our eCommerce development services can include product catalogs, categories, product variations, shopping carts, checkout workflows, customer accounts, order management, and inventory functionality. Available features depend on the scope of your project.</p>
                    <h2>Payment, Delivery, and Store Management</h2>
                    <p>An effective online store needs a convenient shopping experience and reliable operational workflows. We can plan integrations with supported payment gateways, shipping services, and other business systems according to your requirements.</p>
                    <h2>eCommerce SEO and Mobile Shopping</h2>
                    <p>We consider responsive product pages, clear category structures, descriptive product information, accessible navigation, and technical SEO fundamentals. These practices help customers navigate your store and provide a foundation for organic search visibility.</p>
                    <h2>Launch Your Online Store</h2>
                    <p>Contact Areia Soft to discuss your products, store size, payment options, delivery arrangements, and required administration features.</p>
                HTML,
                
                'metrics' => [
                    ['number' => '24/7', 'label' => 'Online Storefront'],
                    ['number' => 'Secure', 'label' => 'Payment Options'],
                    ['number' => 'SEO', 'label' => 'Friendly Structure'],
                    ['number' => 'Mobile', 'label' => 'Shopping Experience'],
                ],
                'features' => [
                    'Custom eCommerce website development',
                    'Product, category, and variation management',
                    'Shopping cart and checkout workflows',
                    'Payment gateway integration',
                    'Inventory and order management',
                    'Customer accounts and order history',
                    'Shipping and delivery integrations',
                    'Responsive product pages and technical SEO foundations',
                ],
                'technologies' => ['Laravel', 'PHP', 'MySQL', 'JavaScript', 'React', 'WooCommerce', 'REST API', 'Payment Gateway APIs'],
                'benefits' => [
                    'Sell products through an online storefront',
                    'Make product discovery and checkout easier',
                    'Organize orders and inventory in one workflow',
                    'Connect payment and delivery services',
                    'Expand store functionality as the business grows',
                ],
                'cta_title' => 'Launch an Online Store Built for Growth',
                'cta_text' => 'Tell us about your products, order process, payment needs, and delivery model. We can help plan an eCommerce website around your business.',
                'cta_button' => 'Start Your eCommerce Project',
                'icon' => '<svg viewBox="0 0 24 24"><circle cx="9" cy="19" r="1.5"/><circle cx="17" cy="19" r="1.5"/><path d="M4 5h2l2 10h10l2-7H7"/></svg>',
                'sort_order' => 6,
                'active' => true,
            ],
            [
                'title' => 'UI/UX Design',
                'slug' => 'ui-ux-design',
                'category' => 'UI/UX Design',
                'description' => 'UI/UX design for websites, mobile apps, and software products focused on clarity, usability, accessibility, and consistent brand experiences.',
                'hero_description' => 'Areia Soft designs intuitive digital experiences that help users understand your product, complete tasks with less friction, and interact confidently with your brand.',
                'image' => 'uploads/services/ui-ux-design.webp',
                'alt_text' => 'UI and UX design services for digital products by Areia Soft',
                'overview' => 'Good design makes a digital product easier to understand and use. Our UI/UX design process connects user needs with business goals through information architecture, wireframes, prototypes, interface design, and usability considerations. Whether you are planning a new website, mobile app, dashboard, or SaaS product, we work toward clear navigation, consistent visual patterns, and interfaces that support the intended tasks.',
                
                'seo_content' => <<<'HTML'
                    <h2>UI/UX Design Services</h2>
                    <p>Areia Soft provides UI/UX design services for websites, mobile applications, dashboards, and software products. We focus on designing digital experiences that help users understand interfaces, navigate information, and complete important tasks more easily.</p>
                    <h2>User Experience Design</h2>
                    <p>User experience design considers the needs, expectations, and goals of the people using a product. Our design process can include user flows, information architecture, wireframes, navigation planning, and prototype development based on project requirements.</p>
                    <h2>User Interface Design</h2>
                    <p>We design interface layouts, typography, visual hierarchy, buttons, forms, reusable components, and responsive screen layouts. Consistent interface patterns help users understand how to interact with a digital product.</p>
                    <h2>Design for Websites and Applications</h2>
                    <p>Whether you are developing a business website, eCommerce store, mobile app, or SaaS dashboard, Areia Soft can help shape an interface that aligns with your brand and supports your users' needs.</p>
                    <h2>Start Your UI/UX Design Project</h2>
                    <p>Contact Areia Soft to discuss your product, target audience, current design challenges, and desired user experience.</p>
                HTML,

                'metrics' => [
                    ['number' => 'UX', 'label' => 'User-Centered Flows'],
                    ['number' => 'UI', 'label' => 'Consistent Interfaces'],
                    ['number' => 'Mobile', 'label' => 'Responsive Thinking'],
                    ['number' => 'Pro', 'label' => 'Interactive Prototypes'],
                ],
                'features' => [
                    'User experience discovery and research support',
                    'Information architecture and navigation planning',
                    'Wireframes and user flows',
                    'Interactive prototypes for early validation',
                    'Website and landing page interface design',
                    'Mobile app and dashboard UI design',
                    'Reusable design systems and components',
                    'Usability and accessibility-focused design',
                ],
                'technologies' => ['Figma', 'Adobe XD', 'Photoshop', 'Illustrator', 'HTML', 'CSS', 'Bootstrap', 'Tailwind CSS'],
                'benefits' => [
                    'Make digital products easier to navigate',
                    'Reduce avoidable user confusion',
                    'Create a consistent visual brand experience',
                    'Help users complete key tasks more confidently',
                    'Validate interface ideas before full development',
                ],
                'cta_title' => 'Design a Better Digital Experience',
                'cta_text' => 'Share your product, users, and design challenges. We can help shape an interface that is clear, consistent, and aligned with your goals.',
                'cta_button' => 'Start Your Design Project',
                'icon' => '<svg viewBox="0 0 24 24"><path d="M12 3l7 4v10l-7 4-7-4V7z"/><circle cx="12" cy="12" r="2.5"/></svg>',
                'sort_order' => 7,
                'active' => true,
            ],
            [
                'title' => 'AI & Automation Solutions',
                'slug' => 'ai-automation-solutions',
                'category' => 'AI & Automation',
                'description' => 'AI integration and business process automation to reduce repetitive work, support information handling, and improve digital workflows.',
                'hero_description' => 'Areia Soft helps organizations identify practical uses for AI and automation, from connecting AI services to existing software to streamlining repeatable business tasks.',
                'image' => 'uploads/services/ai-automation-solutions.webp',
                'alt_text' => 'AI integration and business automation solutions by Areia Soft',
                'overview' => 'AI and automation can be valuable when they solve a clearly defined business problem. Areia Soft helps scope and build AI-enabled workflows, service integrations, chatbots, document-processing features, intelligent search, and other automation tools. We consider the source and quality of data, integration requirements, human review, privacy, and how the solution will fit into existing operations rather than treating AI as a one-size-fits-all answer.',
                
                'seo_content' => <<<'HTML'
                    <h2>AI Integration and Business Automation Services</h2>
                    <p>Areia Soft helps businesses explore practical AI integration and automation opportunities. We develop solutions that connect AI capabilities with existing applications and streamline repeatable workflows where automation is appropriate.</p>
                    <h2>Custom AI-Powered Business Tools</h2>
                    <p>Potential solutions include AI chatbots, intelligent search, document processing, content assistance, information extraction, and AI-enabled features inside business applications. The right approach depends on your data, workflow, accuracy requirements, and intended users.</p>
                    <h2>Workflow Automation and Integrations</h2>
                    <p>Business process automation can reduce repetitive manual steps by connecting applications, moving information between systems, and coordinating defined tasks. Areia Soft can help plan integrations, validation rules, error handling, and human review where needed.</p>
                    <h2>Responsible AI Implementation</h2>
                    <p>AI features should be evaluated against real business requirements. We consider data quality, privacy, security, testing, and appropriate human oversight so the solution fits its intended use rather than relying on AI for every task.</p>
                    <h2>Discuss Your AI Project</h2>
                    <p>Contact Areia Soft to identify the process you want to improve and explore a practical AI integration or automation solution.</p>
                HTML,

                'metrics' => [
                    ['number' => 'AI', 'label' => 'Integrated Solutions'],
                    ['number' => 'Smart', 'label' => 'Workflow Design'],
                    ['number' => 'API', 'label' => 'Service Integration'],
                    ['number' => 'Human', 'label' => 'Review Where Needed'],
                ],
                'features' => [
                    'AI feature integration into existing applications',
                    'AI chatbot and conversational workflow development',
                    'Business process and task automation',
                    'AI API integration and orchestration',
                    'Document extraction and information processing',
                    'Intelligent search and content discovery',
                    'AI-assisted internal tools and workflows',
                    'Testing, safeguards, and human-review design',
                ],
                'technologies' => ['Python', 'OpenAI APIs', 'TensorFlow', 'Node.js', 'Laravel', 'REST API', 'PostgreSQL', 'Docker'],
                'benefits' => [
                    'Reduce time spent on repetitive tasks',
                    'Help teams process information more consistently',
                    'Connect AI capabilities with existing software',
                    'Improve access to relevant business information',
                    'Start with defined use cases and expand responsibly',
                ],
                'cta_title' => 'Find Practical AI Opportunities in Your Business',
                'cta_text' => 'Tell us about the task or workflow you want to improve. We can help evaluate a realistic AI or automation approach for your business.',
                'cta_button' => 'Discuss Your AI Project',
                'icon' => '<svg viewBox="0 0 24 24"><rect x="7" y="7" width="10" height="10" rx="2"/><circle cx="10" cy="11" r="1"/><circle cx="14" cy="11" r="1"/><path d="M10 14c1 .8 3 .8 4 0"/><line x1="12" y1="2" x2="12" y2="5"/><line x1="12" y1="19" x2="12" y2="22"/><line x1="2" y1="12" x2="5" y2="12"/><line x1="19" y1="12" x2="22" y2="12"/></svg>',
                'sort_order' => 8,
                'active' => true,
            ],
            [
                'title' => 'Cloud & DevOps Solutions',
                'slug' => 'cloud-devops-solutions',
                'category' => 'Cloud & DevOps',
                'description' => 'Cloud and DevOps services for deployment automation, application monitoring, infrastructure reliability, and scalable environments.',
                'hero_description' => 'Areia Soft helps development teams improve delivery and reliability with practical cloud infrastructure, CI/CD pipelines, containerization, monitoring, and deployment workflows.',
                'image' => 'uploads/services/cloud-devops-solutions.webp',
                'alt_text' => 'Cloud infrastructure and DevOps services by Areia Soft',
                'overview' => 'A reliable application depends on more than its code. Cloud and DevOps practices help teams deploy changes consistently, monitor system health, and manage infrastructure as applications evolve. Areia Soft supports cloud environment setup, deployment automation, containerization, server configuration, backups, and observability based on the project’s needs. We aim for a delivery process that is repeatable, understandable, and maintainable by your team.',
                
                'seo_content' => <<<'HTML'
                    <h2>Cloud and DevOps Services</h2>
                    <p>Areia Soft provides cloud and DevOps services to help businesses improve application deployment, infrastructure management, monitoring, and software delivery workflows. Our approach is based on the needs of your application, development team, and hosting environment.</p>
                    <h2>Cloud Infrastructure and Deployment</h2>
                    <p>We can help plan cloud environments, server configuration, deployment workflows, containerization, and application hosting. The recommended infrastructure depends on the application's technical requirements, expected workload, budget, and operational needs.</p>
                    <h2>CI/CD and Deployment Automation</h2>
                    <p>Continuous integration and continuous delivery workflows can make software releases more repeatable by automating appropriate build, testing, and deployment steps. We help identify opportunities to reduce manual deployment work and improve release consistency.</p>
                    <h2>Monitoring, Backups, and Reliability</h2>
                    <p>Application logs, monitoring, backup planning, and recovery procedures help teams understand system health and prepare for operational issues. We can help establish practical processes for maintaining and improving your deployment environment.</p>
                    <h2>Improve Your Development Workflow</h2>
                    <p>Contact Areia Soft to discuss your hosting environment, current deployment process, reliability concerns, and cloud infrastructure goals.</p>
                HTML,
                
                'metrics' => [
                    ['number' => 'CI/CD', 'label' => 'Delivery Pipelines'],
                    ['number' => 'Cloud', 'label' => 'Infrastructure Setup'],
                    ['number' => 'Monitor', 'label' => 'Application Health'],
                    ['number' => 'Scale', 'label' => 'Growth Planning'],
                ],
                'features' => [
                    'Cloud infrastructure planning and setup',
                    'CI/CD pipeline implementation',
                    'Docker containerization',
                    'Automated application deployment',
                    'Server and environment configuration',
                    'Application logging and monitoring setup',
                    'Backup and recovery planning',
                    'Infrastructure and deployment optimization',
                ],
                'technologies' => ['AWS', 'Docker', 'GitHub Actions', 'Linux', 'Nginx', 'Kubernetes', 'Terraform', 'Redis'],
                'benefits' => [
                    'Make releases more repeatable',
                    'Reduce avoidable deployment mistakes',
                    'Improve visibility into application health',
                    'Prepare infrastructure for changing demand',
                    'Document and streamline operational workflows',
                ],
                'cta_title' => 'Build a More Reliable Deployment Process',
                'cta_text' => 'Tell us about your current hosting, release process, and reliability goals. We can help identify practical cloud and DevOps improvements.',
                'cta_button' => 'Discuss Your Cloud Project',
                'icon' => '<svg viewBox="0 0 24 24"><path d="M7 18h10a4 4 0 0 0 .6-8A6 6 0 0 0 6.3 8.7 4 4 0 0 0 7 18z"/><polyline points="10,12 12,10 14,12"/><line x1="12" y1="10" x2="12" y2="16"/></svg>',
                'sort_order' => 9,
                'active' => true,
            ],
            [
                'title' => 'API Development & Integration',
                'slug' => 'api-development-integration',
                'category' => 'API Development',
                'description' => 'Custom API development and third-party integrations that help websites, apps, payment services, and business systems exchange data reliably.',
                'hero_description' => 'Areia Soft builds and connects APIs so your applications and business platforms can exchange information through clear, secure, and maintainable integrations.',
                'image' => 'uploads/services/api-development-integration.webp',
                'alt_text' => 'API development and third-party integration services by Areia Soft',
                'overview' => 'Connected systems help reduce manual data transfer and make software more useful. Areia Soft develops APIs and integrates third-party services such as payment providers, CRMs, ERPs, mobile applications, and other platforms. We consider data formats, authentication, validation, error handling, documentation, and operational requirements so integrations are easier to maintain and troubleshoot.',
                
                'seo_content' => <<<'HTML'
                    <h2>API Development and Integration Services</h2>
                    <p>Areia Soft develops APIs and integrates third-party services to help websites, mobile apps, and business systems exchange information. We design integration solutions around your applications, data requirements, authentication needs, and operational workflows.</p>
                    <h2>Custom API Development</h2>
                    <p>Our API development services can include REST APIs, data validation, authentication, authorization, structured responses, error handling, and documentation. We aim to make interfaces understandable and maintainable for the applications and developers that use them.</p>
                    <h2>Third-Party System Integration</h2>
                    <p>We can help connect supported payment providers, CRM and ERP platforms, mobile applications, external APIs, and other business services. Integrations are planned according to each platform's capabilities, access requirements, and technical documentation.</p>
                    <h2>Reliable Data Exchange</h2>
                    <p>Well-planned integrations can reduce manual data transfer and help separate systems work together more efficiently. We consider testing, logging, security, and failure handling as appropriate for the project.</p>
                    <h2>Connect Your Applications</h2>
                    <p>Contact Areia Soft to explain which platforms need to communicate, what data must be exchanged, and what your integration should accomplish.</p>
                HTML,
                
                'metrics' => [
                    ['number' => 'REST', 'label' => 'API Development'],
                    ['number' => 'Secure', 'label' => 'Access Patterns'],
                    ['number' => 'Webhook', 'label' => 'Event Integrations'],
                    ['number' => 'Scale', 'label' => 'Ready Interfaces'],
                ],
                'features' => [
                    'Custom REST API development',
                    'Third-party platform and service integration',
                    'Payment gateway integration',
                    'CRM and ERP system connections',
                    'Mobile application backend APIs',
                    'Authentication and authorization',
                    'Webhook setup and event handling',
                    'API documentation and integration testing',
                ],
                'technologies' => ['Laravel', 'PHP', 'Node.js', 'REST API', 'JSON', 'OAuth', 'MySQL', 'PostgreSQL'],
                'benefits' => [
                    'Connect applications that currently work separately',
                    'Reduce manual data transfer between systems',
                    'Extend products with third-party capabilities',
                    'Create clearer integration contracts and documentation',
                    'Support future integrations with a maintainable API layer',
                ],
                'cta_title' => 'Connect Your Digital Systems',
                'cta_text' => 'Tell us which applications or services need to exchange data. We can help plan an API or integration that fits your technical requirements.',
                'cta_button' => 'Start Your Integration Project',
                'icon' => '<svg viewBox="0 0 24 24"><path d="M8 8l-4 4 4 4"/><path d="M16 8l4 4-4 4"/><line x1="13" y1="5" x2="11" y2="19"/></svg>',
                'sort_order' => 10,
                'active' => true,
            ],
            [
                'title' => 'Software Maintenance & Support',
                'slug' => 'software-maintenance-support',
                'category' => 'Software Support',
                'description' => 'Software maintenance and technical support to help keep websites and applications stable, secure, updated, and aligned with changing needs.',
                'hero_description' => 'Areia Soft provides ongoing maintenance for existing websites and applications, including troubleshooting, security updates, performance improvements, and planned enhancements.',
                'image' => 'uploads/services/software-maintenance-support.webp',
                'alt_text' => 'Software maintenance and technical support services by Areia Soft',
                'overview' => 'Software requires attention after launch as dependencies, security expectations, infrastructure, and business needs change. Areia Soft helps maintain existing applications through bug investigation, updates, performance reviews, database care, backup planning, and feature improvements. Support can be tailored to your system and priorities, with a focus on making changes carefully and keeping your application maintainable.',
                
                'seo_content' => <<<'HTML'
                    <h2>Software Maintenance and Technical Support</h2>
                    <p>Areia Soft provides software maintenance and technical support for websites and applications that need ongoing updates, troubleshooting, performance improvements, and functional enhancements. Our support approach is tailored to the existing system and its priorities.</p>
                    <h2>Bug Fixing and Troubleshooting</h2>
                    <p>We help investigate application errors, broken functionality, compatibility problems, and other technical issues. Effective troubleshooting begins with understanding the symptoms, environment, and underlying cause before implementing a suitable fix.</p>
                    <h2>Updates and Security Maintenance</h2>
                    <p>Software dependencies, platforms, and infrastructure change over time. Maintenance may include dependency updates, compatibility checks, configuration reviews, and other appropriate measures to help keep an application supported and maintainable.</p>
                    <h2>Performance and Ongoing Improvements</h2>
                    <p>Depending on the system, support may include database optimization, performance reviews, backup checks, feature enhancements, and operational improvements. The work is prioritized according to business impact and technical requirements.</p>
                    <h2>Get Support for Your Existing Software</h2>
                    <p>Contact Areia Soft with details about your website or application, the issues you are experiencing, and the maintenance or improvements you need.</p>
                HTML,

                'metrics' => [
                    ['number' => 'Proactive', 'label' => 'Maintenance Options'],
                    ['number' => 'Secure', 'label' => 'Update Practices'],
                    ['number' => 'Fast', 'label' => 'Performance Reviews'],
                    ['number' => 'Ongoing', 'label' => 'Technical Support'],
                ],
                'features' => [
                    'Bug fixing and troubleshooting',
                    'Dependency and security updates',
                    'Application performance optimization',
                    'Database health and query optimization',
                    'Application logs and issue investigation',
                    'Backup and recovery checks',
                    'Feature improvements and compatibility updates',
                    'Technical support and maintenance planning',
                ],
                'technologies' => ['Laravel', 'PHP', 'MySQL', 'Linux', 'Nginx', 'Docker', 'Git', 'AWS'],
                'benefits' => [
                    'Address issues before they disrupt users where possible',
                    'Keep software dependencies and components maintained',
                    'Improve stability and performance over time',
                    'Extend the useful life of existing applications',
                    'Access technical support for planned improvements',
                ],
                'cta_title' => 'Keep Your Software Maintained and Reliable',
                'cta_text' => 'Tell us about your existing website or application, its current challenges, and the support you need. We can help plan the next steps.',
                'cta_button' => 'Get Software Support',
                'icon' => '<svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="3"/><path d="M19.4 15a1.7 1.7 0 0 0 .3 1.8l.1.1a2 2 0 1 1-2.8 2.8l-.1-.1a1.7 1.7 0 0 0-1.8-.3 1.7 1.7 0 0 0-1 1.5V21a2 2 0 1 1-4 0v-.2a1.7 1.7 0 0 0-1-1.5 1.7 1.7 0 0 0-1.8.3l-.1.1a2 2 0 1 1-2.8-2.8l.1-.1a1.7 1.7 0 0 0 .3-1.8 1.7 1.7 0 0 0-1.5-1H3a2 2 0 1 1 0-4h.2a1.7 1.7 0 0 0 1.5-1 1.7 1.7 0 0 0-.3-1.8l-.1-.1a2 2 0 1 1 2.8-2.8l.1.1a1.7 1.7 0 0 0 1.8.3H9A1.7 1.7 0 0 0 10 3.2V3a2 2 0 1 1 4 0v.2a1.7 1.7 0 0 0 1 1.5h.2a1.7 1.7 0 0 0 1.8-.3l.1-.1a2 2 0 1 1 2.8 2.8l-.1.1a1.7 1.7 0 0 0-.3 1.8v0a1.7 1.7 0 0 0 1.5 1H21a2 2 0 1 1 0 4h-.2a1.7 1.7 0 0 0-1.4 1z"/></svg>',
                'sort_order' => 11,
                'active' => true,
            ],
            [
                'title' => 'Digital Transformation',
                'slug' => 'digital-transformation',
                'category' => 'Digital Transformation',
                'description' => 'Digital transformation services that modernize workflows, connect business systems, and help organizations adopt technology with a clear purpose.',
                'hero_description' => 'Areia Soft helps businesses improve how work gets done through process analysis, workflow automation, system integration, and fit-for-purpose digital solutions.',
                'image' => 'uploads/services/digital-transformation.webp',
                'alt_text' => 'Digital transformation and business process modernization by Areia Soft',
                'overview' => 'Digital transformation is not simply moving an existing process online; it is understanding where work slows down and using technology to improve it. Areia Soft helps organizations identify operational gaps and plan connected workflows, modern software, cloud adoption, integrations, and reporting tools. We focus on practical improvements that match your priorities, existing systems, and readiness for change.',
                
                'seo_content' => <<<'HTML'
                    <h2>Digital Transformation Services</h2>
                    <p>Areia Soft helps businesses modernize processes and adopt technology with a clear business purpose. Our digital transformation services focus on identifying operational challenges and planning practical improvements through software, integrations, automation, and better access to information.</p>
                    <h2>Business Process Analysis and Automation</h2>
                    <p>Manual processes and disconnected tools can make daily work slower and harder to manage. We help identify opportunities to streamline workflows, reduce repeated data entry, and improve how information moves between teams and systems.</p>
                    <h2>Modern Software and System Integration</h2>
                    <p>Digital transformation may involve custom applications, workflow tools, dashboards, cloud infrastructure, API integrations, or improvements to existing systems. We help match the technical approach to your current environment, business priorities, and available resources.</p>
                    <h2>A Practical Technology Roadmap</h2>
                    <p>Successful transformation starts with clear goals and realistic priorities. Areia Soft can help organize requirements, identify potential improvements, and plan implementation steps that align with your organization's needs.</p>
                    <h2>Plan Your Digital Transformation</h2>
                    <p>Contact Areia Soft to discuss the processes, systems, or customer experiences you want to improve and explore suitable technology solutions.</p>
                HTML,

                'metrics' => [
                    ['number' => '360°', 'label' => 'Process Perspective'],
                    ['number' => 'Smart', 'label' => 'Automation Options'],
                    ['number' => 'Connected', 'label' => 'Digital Workflows'],
                    ['number' => 'Scale', 'label' => 'Ready Roadmap'],
                ],
                'features' => [
                    'Digital transformation planning and consultation',
                    'Business process analysis and automation',
                    'Legacy application modernization planning',
                    'Custom software development',
                    'Cloud adoption and infrastructure improvements',
                    'Business system and data integration',
                    'Digital workflow design and implementation',
                    'Operational dashboards and reporting tools',
                ],
                'technologies' => ['Laravel', 'PHP', 'React', 'Node.js', 'AWS', 'Docker', 'MySQL', 'REST API'],
                'benefits' => [
                    'Identify and improve inefficient business processes',
                    'Reduce repetitive manual operations',
                    'Make business information easier to access',
                    'Connect tools and teams through better workflows',
                    'Build a technology roadmap aligned with business goals',
                ],
                'cta_title' => 'Move Your Business Forward With Technology',
                'cta_text' => 'Tell us which processes, systems, or customer experiences you want to improve. We can help identify practical steps toward digital transformation.',
                'cta_button' => 'Plan Your Digital Transformation',
                'icon' => '<svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 3"/><path d="M8 4l4-2 4 2"/></svg>',
                'sort_order' => 12,
                'active' => true,
            ],
        ];

        foreach ($services as $service) {
            Service::updateOrCreate(
                ['slug' => $service['slug']],
                $service
            );
        }
    }
}
