
    <div class="max-w-5xl mx-auto px-6 py-8">

        <!-- HEADER -->
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-2xl font-bold text-gray-800">
                Your Blogs
            </h1>

            <!-- Create Button -->
            <a href="{{ route('blog.create') }}"
               class="bg-indigo-600 text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-indigo-700 transition">
                + Create Blog
            </a>
        </div>

        <!-- BLOG LIST -->
        <div class="space-y-6">

            <!-- BLOG CARD -->
            <a href="{{ route('blog.show', 1) }}"
               class="block bg-white border border-gray-200 rounded-xl p-6 hover:shadow-md transition">

                <!-- Author Info -->
                <div class="mb-3">
                    <h2 class="font-semibold text-gray-900">
                        Bikash Khanal
                    </h2>
                    <p class="text-sm text-gray-500">
                        @bikashkhanal
                    </p>
                </div>

                <!-- Blog Description -->
                <p class="text-gray-700 text-sm leading-relaxed line-clamp-3">
                    Laravel provides an elegant syntax that helps developers
                    build robust applications faster. In this blog, we explore
                    how clean architecture principles can be applied to a
                    real-world Laravel project to improve scalability and
                    maintainability.
                </p>

                <!-- View Hint -->
                <div class="mt-4 text-sm text-indigo-600 font-medium">
                    Click to read full blog →
                </div>
            </a>

            <!-- Repeat Blog Card -->
            <a href="{{ route('blog.show', 2) }}"
               class="block bg-white border border-gray-200 rounded-xl p-6 hover:shadow-md transition">

                <div class="mb-3">
                    <h2 class="font-semibold text-gray-900">
                        John Doe
                    </h2>
                    <p class="text-sm text-gray-500">
                        @johndoe
                    </p>
                </div>

                <p class="text-gray-700 text-sm leading-relaxed line-clamp-3">
                    Understanding the difference between domain services and
                    application services is crucial when designing scalable
                    backend systems. This article breaks down the concepts
                    with practical Laravel examples.
                </p>

                <div class="mt-4 text-sm text-indigo-600 font-medium">
                    Click to read full blog →
                </div>
            </a>

        </div>
    </div>

