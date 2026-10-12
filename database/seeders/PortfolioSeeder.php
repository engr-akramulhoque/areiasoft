<?php

namespace Database\Seeders;

use App\Models\Portfolio;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PortfolioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $portfolios = [
            [
                'image' => 'uploads/portfolios/exclusive-khushaal.webp',
                'title' => 'Exclusive Khushaal',
                'category' => ['ecommerce', 'web'],
                'tags' => ['E-Commerce', 'Laravel', 'Fashion'],
                'overview' => 'Exclusive Khushaal is a premium fashion eCommerce website designed to provide customers with a modern, engaging, and convenient online shopping experience with elegant product showcases, secure payments, and efficient product management.',
                'description' => '<h2>Premium Fashion eCommerce Experience</h2>
                    <p>Exclusive Khushaal is a premium fashion eCommerce platform designed to provide customers with a modern, engaging, and convenient online shopping experience. The website combines an elegant visual presentation with practical eCommerce functionality to help customers discover products and complete purchases with ease.</p>
                    <p>The platform provides a structured product browsing experience with attractive product showcases, organized categories, and a streamlined shopping journey. Customers can explore fashion products, review product information, and proceed through a secure online purchasing process.</p>
                    <h3>Key Highlights</h3>
                    <ul>
                        <li>Modern fashion-focused eCommerce interface</li>
                        <li>Elegant product presentation and product browsing</li>
                        <li>Secure online payment integration</li>
                        <li>Product and inventory management</li>
                        <li>Responsive experience across desktop and mobile devices</li>
                        <li>Streamlined customer shopping journey</li>
                    </ul>
                    <p>The solution was developed with scalability and usability in mind, creating a professional digital storefront that supports both customer engagement and efficient business operations.</p>',
                'url' => 'https://exclusivekhushaal.com',
                'featured' => true,
                'status' => true,
                'sort_order' => 1,
            ],

            [
                'image' => 'uploads/portfolios/babul-itc.webp',
                'title' => 'Babul International Training Center',
                'category' => ['web', 'software'],
                'tags' => ['Training', 'Overseas', 'Laravel'],
                'overview' => 'Babul International Training Center is a professional overseas training and recruitment website providing course information, student registration, visa guidance, recruitment services, and essential resources for aspiring international workers.',
                'description' => '<h2>Overseas Training & Recruitment Platform</h2>
                    <p>Babul International Training Center is a complete digital platform developed for an overseas training and recruitment organization. The website provides visitors with essential information about training programs, overseas employment opportunities, recruitment services, and related guidance through an organized and professional interface.</p>
                    <p>The platform is designed to make it easier for students, candidates, and potential overseas workers to discover relevant services and access important information. Clear service sections and structured content help users navigate training programs, registration processes, recruitment opportunities, and visa-related information.</p>
                    <h3>Key Highlights</h3>
                    <ul>
                        <li>Professional overseas training center website</li>
                        <li>Training course and program information</li>
                        <li>Student and candidate registration functionality</li>
                        <li>Overseas recruitment service presentation</li>
                        <li>Visa and overseas employment information</li>
                        <li>Laravel-powered administration panel</li>
                        <li>Responsive and user-friendly interface</li>
                    </ul>
                    <p>The platform provides the organization with a centralized digital presence while making its training and overseas recruitment services more accessible to candidates and visitors.</p>',
                'url' => 'https://babulitc.com',
                'featured' => true,
                'status' => true,
                'sort_order' => 2,
            ],

            [
                'image' => 'uploads/portfolios/pizeon.webp',
                'title' => 'Pizeon Luxury Liners',
                'category' => ['ecommerce', 'web'],
                'tags' => ['Multi Vendor', 'E-Commerce', 'Marketplace'],
                'overview' => 'Pizeon Luxury Liners is a modern multi-vendor eCommerce marketplace that connects multiple sellers with customers through a unified platform for product management, online orders, inventory, and secure digital transactions.',
                'description' => '<h2>Modern Multi-Vendor eCommerce Marketplace</h2>
                    <p>Pizeon Luxury Liners is a modern multi-vendor eCommerce marketplace designed to bring multiple sellers and customers together through a unified online shopping platform. The solution provides the foundation required for vendors to manage their products while customers can browse and purchase products through a convenient digital storefront.</p>
                    <p>The marketplace architecture focuses on simplifying vendor operations and creating an organized shopping experience. Sellers can manage their products, inventory, and orders, while customers can explore marketplace offerings and complete purchases through a streamlined checkout experience.</p>
                    <h3>Key Highlights</h3>
                    <ul>
                        <li>Multi-vendor marketplace architecture</li>
                        <li>Individual seller and product management</li>
                        <li>Product and inventory management</li>
                        <li>Online order management</li>
                        <li>Secure online payment functionality</li>
                        <li>Customer-focused marketplace experience</li>
                        <li>Scalable platform structure for multiple vendors</li>
                    </ul>
                    <p>The platform provides a flexible foundation for growing an online marketplace while giving vendors the tools they need to manage their digital storefronts and business operations efficiently.</p>',
                'url' => 'https://pizeon.com',
                'featured' => true,
                'status' => true,
                'sort_order' => 3,
            ],

            [
                'image' => 'uploads/portfolios/fiha-aliya.webp',
                'title' => 'Fiha Aliya Overseas & Training Center',
                'category' => ['web', 'software'],
                'tags' => ['Recruitment', 'Training', 'Overseas'],
                'overview' => 'Fiha Aliya Overseas & Training Center is a professional recruitment and training website providing overseas employment information, candidate registration, employer services, visa processing resources, and training programs.',
                'description' => '<h2>Overseas Recruitment & Training Website</h2>
                    <p>Fiha Aliya Overseas & Training Center is a professional digital platform created for an organization providing overseas recruitment and training services. The website presents recruitment opportunities, training programs, candidate services, employer solutions, and overseas employment information in a structured and accessible format.</p>
                    <p>The platform is designed to provide candidates with useful information throughout their journey, from discovering available opportunities to learning about registration, recruitment, training, and visa processing services. The professional interface helps establish trust while making important services easier to explore.</p>
                    <h3>Key Highlights</h3>
                    <ul>
                        <li>Professional overseas recruitment website</li>
                        <li>Training program and course information</li>
                        <li>Candidate registration and service information</li>
                        <li>Employer recruitment services</li>
                        <li>Visa processing and overseas employment information</li>
                        <li>Responsive user-friendly website interface</li>
                        <li>Structured presentation of recruitment and training services</li>
                    </ul>
                    <p>The solution creates a centralized online presence for the organization and provides candidates and employers with a convenient way to explore available services and opportunities.</p>',
                'url' => '#',
                'featured' => false,
                'status' => true,
                'sort_order' => 4,
            ],

            [
                'image' => 'uploads/portfolios/chaya-properties.webp',
                'title' => 'Chaya Properties',
                'category' => ['web', 'software'],
                'tags' => ['Real Estate', 'Property', 'Laravel'],
                'overview' => 'Chaya Properties is a modern real estate website designed for showcasing residential and commercial properties with detailed property listings, inquiry management, and an easy-to-use property discovery experience.',
                'description' => '<h2>Modern Real Estate Property Platform</h2>
                    <p>Chaya Properties is a complete real estate platform developed to showcase residential and commercial properties through a modern and professional digital experience. The website is designed to help potential buyers and property seekers discover available properties while providing detailed information about each listing.</p>
                    <p>The platform organizes property information into an easy-to-navigate structure, allowing visitors to explore different properties and review relevant details before making an inquiry. The solution also supports property-focused content management and customer inquiry workflows.</p>
                    <h3>Key Highlights</h3>
                    <ul>
                        <li>Residential and commercial property listings</li>
                        <li>Detailed property information and presentation</li>
                        <li>Property discovery and browsing experience</li>
                        <li>Customer inquiry management</li>
                        <li>Location-focused property information</li>
                        <li>Responsive real estate website design</li>
                        <li>Laravel-powered platform architecture</li>
                    </ul>
                    <p>The platform provides Chaya Properties with a professional digital presence while creating a convenient property discovery experience for customers looking for residential and commercial real estate opportunities.</p>',
                'url' => 'https://chaya-properties.bniclbd.com',
                'featured' => true,
                'status' => true,
                'sort_order' => 5,
            ],

            [
                'image' => 'uploads/portfolios/clean-service.webp',
                'title' => 'Clean & Service XYZ',
                'category' => ['web', 'software'],
                'tags' => ['Cleaning', 'Service Booking', 'Business'],
                'overview' => 'Clean & Service XYZ is an online cleaning service platform that helps customers discover professional cleaning services, schedule appointments, submit service requests, and manage bookings through a convenient digital experience.',
                'description' => '<h2>Online Cleaning Service Booking Platform</h2>
                    <p>Clean & Service XYZ is an online cleaning service management platform designed to connect customers with professional cleaning services through a convenient digital booking experience. The platform presents available services clearly and makes it easier for customers to request and schedule cleaning appointments.</p>
                    <p>The website focuses on simplifying the service booking process by allowing customers to explore cleaning services, select suitable options, submit service requests, and manage appointment-related information through an organized interface.</p>
                    <h3>Key Highlights</h3>
                    <ul>
                        <li>Professional cleaning service website</li>
                        <li>Online cleaning service booking</li>
                        <li>Service information and pricing presentation</li>
                        <li>Appointment scheduling functionality</li>
                        <li>Customer service request management</li>
                        <li>Responsive and mobile-friendly interface</li>
                        <li>Efficient digital service management workflow</li>
                    </ul>
                    <p>The platform helps modernize the cleaning service business by providing customers with a simple way to discover services and request appointments while supporting efficient service management.</p>',
                'url' => 'https://cleanandservice.xyz',
                'featured' => false,
                'status' => true,
                'sort_order' => 6,
            ],
        ];

        foreach ($portfolios as $portfolio) {
            Portfolio::updateOrCreate(
                ['slug' => Str::slug($portfolio['title'])],
                $portfolio
            );
        }
    }
}
