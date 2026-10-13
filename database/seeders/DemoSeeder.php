<?php

namespace Database\Seeders;

use App\Models\Demo;
use App\Models\DemoCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DemoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Medical & Healthcare',
                'slug' => 'medical-healthcare',
                'description' => 'Professional website demos designed for doctors, clinics, hospitals, and healthcare professionals.',
                'icon' => 'ti ti-stethoscope',
                'image' => null,
                'serial_no' => 1,
                'status' => true,

                'demos' => [
                    [
                        'title' => 'Dr. Arif Rahman',
                        'slug' => 'dr-arif-rahman',
                        'short_description' => 'A premium specialist doctor portfolio website with a professional healthcare-focused interface.',
                        'description' => 'A modern and responsive doctor portfolio website designed for specialist physicians and medical professionals. The design focuses on doctor profile presentation, specialization, services, appointments, patient information, and professional credibility.',
                        'thumbnail' => null,
                        'preview_image' => null,
                        'demo_url' => '#',
                        'technology' => 'HTML, Bootstrap, JavaScript',
                        'serial_no' => 1,
                        'featured' => true,
                        'status' => true,
                    ],

                    [
                        'title' => 'Specialist Doctor',
                        'slug' => 'specialist-doctor',
                        'short_description' => 'A clean and elegant specialist doctor website demo focused on patient trust and appointment conversion.',
                        'description' => 'A responsive medical portfolio concept created for specialist doctors, featuring doctor information, expertise, services, appointment options, patient resources, and professional content sections.',
                        'thumbnail' => null,
                        'preview_image' => null,
                        'demo_url' => '#',
                        'technology' => 'HTML, Bootstrap, JavaScript',
                        'serial_no' => 2,
                        'featured' => false,
                        'status' => true,
                    ],

                    [
                        'title' => 'Dental Care Clinic',
                        'slug' => 'dental-care-clinic',
                        'short_description' => 'A modern dental clinic website concept with service-focused sections and appointment features.',
                        'description' => 'A professional dental clinic website designed to showcase treatments, doctors, facilities, patient information, and appointment services in a clean and trustworthy interface.',
                        'thumbnail' => null,
                        'preview_image' => null,
                        'demo_url' => '#',
                        'technology' => 'HTML, Bootstrap, JavaScript',
                        'serial_no' => 3,
                        'featured' => false,
                        'status' => true,
                    ],
                ],
            ],

            [
                'name' => 'Digital Agency',
                'slug' => 'digital-agency',
                'description' => 'Creative website demos for digital marketing agencies, software companies, creative studios, and technology businesses.',
                'icon' => 'ti ti-brand-google-analytics',
                'image' => null,
                'serial_no' => 2,
                'status' => true,

                'demos' => [
                    [
                        'title' => 'Foisora Digital',
                        'slug' => 'foisora-digital',
                        'short_description' => 'A modern digital marketing agency website designed to showcase creative services and business results.',
                        'description' => 'A professional digital marketing agency website concept featuring services, case studies, portfolio projects, marketing solutions, client-focused messaging, and conversion-oriented sections.',
                        'thumbnail' => null,
                        'preview_image' => null,
                        'demo_url' => 'https://foisoradigital.com',
                        'technology' => 'Laravel, Bootstrap, JavaScript',
                        'serial_no' => 1,
                        'featured' => true,
                        'status' => true,
                    ],

                    [
                        'title' => 'Creative Digital Agency',
                        'slug' => 'creative-digital-agency',
                        'short_description' => 'A bold agency website concept for creative, branding, marketing, and digital services.',
                        'description' => 'A creative agency website demo designed around strong visual presentation, service discovery, portfolio showcasing, case studies, and lead generation.',
                        'thumbnail' => null,
                        'preview_image' => null,
                        'demo_url' => '#',
                        'technology' => 'HTML, Bootstrap, JavaScript',
                        'serial_no' => 2,
                        'featured' => false,
                        'status' => true,
                    ],

                    [
                        'title' => 'Software Development Agency',
                        'slug' => 'software-development-agency',
                        'short_description' => 'A professional software development company website concept for technology businesses.',
                        'description' => 'A technology-focused agency website designed to present software development services, web applications, mobile applications, technology expertise, projects, and business solutions.',
                        'thumbnail' => null,
                        'preview_image' => null,
                        'demo_url' => '#',
                        'technology' => 'Laravel, Bootstrap, JavaScript',
                        'serial_no' => 3,
                        'featured' => false,
                        'status' => true,
                    ],
                ],
            ],

            [
                'name' => 'Corporate & Business',
                'slug' => 'corporate-business',
                'description' => 'Professional corporate website concepts for companies, organizations, enterprises, and business brands.',
                'icon' => 'ti ti-building',
                'image' => null,
                'serial_no' => 3,
                'status' => true,

                'demos' => [
                    [
                        'title' => 'Corporate Business',
                        'slug' => 'corporate-business',
                        'short_description' => 'A premium corporate website concept designed for modern businesses and organizations.',
                        'description' => 'A professional corporate website featuring company information, services, leadership, business achievements, projects, news, contact information, and corporate presentation sections.',
                        'thumbnail' => null,
                        'preview_image' => null,
                        'demo_url' => '#',
                        'technology' => 'Laravel, Bootstrap, JavaScript',
                        'serial_no' => 1,
                        'featured' => true,
                        'status' => true,
                    ],

                    [
                        'title' => 'Enterprise Company',
                        'slug' => 'enterprise-company',
                        'short_description' => 'A structured enterprise website concept focused on corporate communication and business solutions.',
                        'description' => 'A scalable corporate website concept for established companies and enterprises with dedicated sections for services, industries, company information, leadership, projects, and business insights.',
                        'thumbnail' => null,
                        'preview_image' => null,
                        'demo_url' => '#',
                        'technology' => 'Laravel, Bootstrap, JavaScript',
                        'serial_no' => 2,
                        'featured' => false,
                        'status' => true,
                    ],
                ],
            ],

            [
                'name' => 'E-commerce',
                'slug' => 'ecommerce',
                'description' => 'Modern e-commerce and product-focused website demos for online businesses and retail brands.',
                'icon' => 'ti ti-shopping-cart',
                'image' => null,
                'serial_no' => 4,
                'status' => true,

                'demos' => [
                    [
                        'title' => 'Fashion Store',
                        'slug' => 'fashion-store',
                        'short_description' => 'A modern fashion e-commerce website concept with product discovery and shopping-focused UI.',
                        'description' => 'A responsive fashion store website featuring product collections, categories, product details, size and color selection, shopping experience, promotional sections, and brand presentation.',
                        'thumbnail' => null,
                        'preview_image' => null,
                        'demo_url' => '#',
                        'technology' => 'Laravel, Bootstrap, JavaScript',
                        'serial_no' => 1,
                        'featured' => true,
                        'status' => true,
                    ],

                    [
                        'title' => 'Single Product Store',
                        'slug' => 'single-product-store',
                        'short_description' => 'A high-converting single-product e-commerce landing page designed for online campaigns.',
                        'description' => 'A product-focused e-commerce landing page concept featuring product galleries, variants, product benefits, customer reviews, pricing, order information, and conversion-focused sections.',
                        'thumbnail' => null,
                        'preview_image' => null,
                        'demo_url' => '#',
                        'technology' => 'HTML, Bootstrap, JavaScript',
                        'serial_no' => 2,
                        'featured' => false,
                        'status' => true,
                    ],
                ],
            ],

            [
                'name' => 'Real Estate',
                'slug' => 'real-estate',
                'description' => 'Premium real estate website demos for property companies, developers, agencies, and property professionals.',
                'icon' => 'ti ti-home',
                'image' => null,
                'serial_no' => 5,
                'status' => true,

                'demos' => [
                    [
                        'title' => 'Premium Properties',
                        'slug' => 'premium-properties',
                        'short_description' => 'A premium real estate website concept for property developers and real estate businesses.',
                        'description' => 'A modern real estate website designed to showcase properties, developments, locations, amenities, property details, company information, and customer inquiries.',
                        'thumbnail' => null,
                        'preview_image' => null,
                        'demo_url' => '#',
                        'technology' => 'Laravel, Bootstrap, JavaScript',
                        'serial_no' => 1,
                        'featured' => true,
                        'status' => true,
                    ],

                    [
                        'title' => 'Property Listing',
                        'slug' => 'property-listing',
                        'short_description' => 'A property listing website concept with searchable property presentation and detailed property pages.',
                        'description' => 'A responsive property listing platform concept designed to present residential and commercial properties with filtering, property information, location details, image galleries, and inquiry functionality.',
                        'thumbnail' => null,
                        'preview_image' => null,
                        'demo_url' => '#',
                        'technology' => 'Laravel, Bootstrap, JavaScript',
                        'serial_no' => 2,
                        'featured' => false,
                        'status' => true,
                    ],
                ],
            ],
        ];

        foreach ($categories as $categoryData) {

            $demos = $categoryData['demos'];

            unset($categoryData['demos']);

            $category = DemoCategory::updateOrCreate(
                [
                    'slug' => $categoryData['slug'],
                ],
                $categoryData
            );

            foreach ($demos as $demoData) {

                $demoData['demo_category_id'] = $category->id;

                Demo::updateOrCreate(
                    [
                        'slug' => $demoData['slug'],
                    ],
                    $demoData
                );
            }
        }
    }
}
