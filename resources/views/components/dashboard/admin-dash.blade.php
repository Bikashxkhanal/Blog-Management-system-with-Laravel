
    <div class="max-w-6xl mx-auto px-6 py-8">

        <!-- HEADER -->
        <div class="mb-10">
            <h1 class="text-3xl font-bold text-gray-900">
                Blog Management
            </h1>
            <p class="text-sm text-gray-500 mt-1">
                View and monitor all published blogs
            </p>
        </div>

        <!-- BLOG LIST -->
        <div class="space-y-8">

            <!-- BLOG CARD -->
            <a href="{{ route('blog.show', 1) }}"
               class="group block bg-white border border-gray-200 rounded-2xl p-6 hover:shadow-xl hover:border-indigo-300 transition">

                <div class="flex justify-between items-start">

                    <!-- Author Info -->
                    <div>
                        <h2 class="font-semibold text-lg text-gray-900">
                            Bikash Khanal
                        </h2>
                        <p class="text-sm text-gray-500">
                            @bikashkhanal
                        </p>
                    </div>

                    <!-- Status Badge -->
                    <span class="text-xs font-semibold px-3 py-1 rounded-full bg-green-100 text-green-700">
                        Published
                    </span>
                </div>

                <!-- Divider -->
                <div class="my-4 border-t border-gray-100"></div>

                <!-- Blog Preview -->
                <p class="text-gray-700 leading-relaxed line-clamp-3">
                    Clean architecture in Laravel helps separate business
                    logic from framework concerns. This blog discusses
                    domain-driven principles and shows how to structure
                    services, policies, and repositories effectively.
                </p>

                <!-- Footer -->
                <div class="mt-5 flex justify-between items-center text-sm">
                    <span class="text-gray-500">
                        Published on Jan 28, 2026
                    </span>
                    <span class="text-indigo-600 font-medium group-hover:underline">
                        View full blog →
                    </span>
                </div>
            </a>

            <!-- SECOND BLOG CARD -->
            <a href="{{ route('blog.show', 2) }}"
               class="group block bg-white border border-gray-200 rounded-2xl p-6 hover:shadow-xl hover:border-indigo-300 transition">

                <div class="flex justify-between items-start">
                    <div>
                        <h2 class="font-semibold text-lg text-gray-900">
                            John Doe
                        </h2>
                        <p class="text-sm text-gray-500">
                            @johndoe
                        </p>
                    </div>

                    <span class="text-xs font-semibold px-3 py-1 rounded-full bg-yellow-100 text-yellow-700">
                        Draft
                    </span>
                </div>

                <div class="my-4 border-t border-gray-100"></div>

                <p class="text-gray-700 leading-relaxed line-clamp-3">
                    Understanding authorization versus business rules is
                    essential in backend systems. This article explains how
                    Laravel policies differ from domain policies with real
                    examples.
                </p>

                <div class="mt-5 flex justify-between items-center text-sm">
                    <span class="text-gray-500">
                        Last updated Feb 1, 2026
                    </span>
                    <span class="text-indigo-600 font-medium group-hover:underline">
                        View full blog →
                    </span>
                </div>
            </a>

        </div>
    </div>

