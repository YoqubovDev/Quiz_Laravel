<x-header></x-header>
<body class="flex flex-col min-h-screen bg-gray-100">
<!-- Navigation -->
<nav class="bg-white shadow-lg">
    <div class="max-w-6xl mx-auto px-4">
        <div class="flex justify-between">
            <div class="flex space-x-7">
                <div>
                    <a href="index.html" class="flex items-center py-4 px-2">
                        <span class="font-semibold text-gray-500 text-lg">Quiz Platform</span>
                    </a>
                </div>
            </div>
            <div class="flex items-center space-x-3">
                <a href="dashboard.html" class="py-2 px-4 text-gray-500 hover:text-gray-700">Dashboard</a>
                <a href="profile.html" class="py-2 px-4 text-gray-500 hover:text-gray-700">Profile</a>
            </div>
        </div>
    </div>
</nav>

<!-- Main Content -->
<main class="flex-grow container mx-auto px-4 py-8">
    <!-- Results Card -->
    <div id="results-card" class="max-w-4xl mx-auto bg-white rounded-lg shadow-md p-6">
        <div class="text-center">
            <h2 class="text-2xl font-bold text-gray-800 mb-4">Quiz Complete!</h2>
            <h3 class="text-xl text-gray-700 mb-6">{{ $quiz->title }}</h3>
            <p class="text-xl text-gray-700 mb-6">{{ $quiz->description }}</p>

            <div class="flex justify-center space-x-12 mb-8">
                <div class="text-center">
                    <p class="text-3xl font-bold text-blue-600" id="final-score">{{ $correctOptionCount }}/{{ $quiz->questions_count }}</p>
                    <p class="text-gray-600">Final Score</p>
                </div>
                <div class="text-center">
                    <p class="text-3xl font-bold text-blue-600" id="time-taken">{{ $time_taken->h ? $time_taken->h . ':' . $time_taken->i . ':' . $time_taken->s : $time_taken->i . ':' . $time_taken->s}}</p>
                    <p class="text-gray-600">Time Taken</p>
                </div>
            </div>

            <a href="{{ route('dashboard') }}" class="inline-block px-8 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                Return to Dashboard
            </a>
        </div>
    </div>
</main>
<x-main.footer></x-main.footer>
