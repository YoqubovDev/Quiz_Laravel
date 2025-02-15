<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Take Quiz - Quiz Platform</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex flex-col min-h-screen bg-gray-100">

<!-- Navigation -->
<x-navbar></x-navbar>

<!-- Main Content -->
<main class="flex-grow container mx-auto px-4 py-8">
    <div id="start-card" class="max-w-4xl mx-auto bg-white rounded-lg shadow-md p-6">
        <div class="text-center">
            <h2 class="text-2xl font-bold text-gray-800 mb-4" id="title">Quiz Title</h2>
            <p class="text-xl text-gray-700 mb-6" id="description">Lorem ipsum dolor sit amet, consectetur
                adipisicing elit.
                Accusamus delectus dolorum eligendi esse excepturi in quam qui veritatis voluptatibus?
                Dolore.</p>

            <div class="flex justify-center space-x-12 mb-8">
                <div class="text-center">
                    <!--                            <p class="text-3xl font-bold text-blue-600" id="final-score">0/10</p>-->
                </div>
                <div class="text-center">
                    <p class="text-3xl font-bold text-blue-600" id="time-taken">5:00</p>
                    <p class="text-gray-600">Time Limit</p>
                </div>
            </div>

            <button id="start-btn"
                    class="inline-block px-8 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                Start Quiz
            </button>
        </div>
    </div>
    <!-- Results Card -->
    <div id="results-card" class="max-w-4xl mx-auto bg-white rounded-lg shadow-md p-6 hidden">
        <div class="text-center">
            <h2 class="text-2xl font-bold text-gray-800 mb-4">Quiz Complete!</h2>
            <h3 class="text-xl text-gray-700 mb-6">JavaScript Fundamentals Quiz</h3>

            <div class="flex justify-center space-x-12 mb-8">
                <div class="text-center">
                    <p class="text-3xl font-bold text-blue-600" id="final-score">0/10</p>
                    <p class="text-gray-600">Final Score</p>
                </div>
                <div class="text-center">
                    <p class="text-3xl font-bold text-blue-600" id="time-taken">0:00</p>
                    <p class="text-gray-600">Time Taken</p>
                </div>
            </div>

            <a href="{{ route('dashboard') }}" class="inline-block px-8 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                Return to Dashboard
            </a>
        </div>
    </div>
</main>

<!-- Footer -->
<footer class="bg-white shadow-lg mt-8">
    <div class="max-w-6xl mx-auto px-4 py-4">
        <div class="text-center text-gray-500 text-sm">
            © 2024 Quiz Platform. All rights reserved.
        </div>
    </div>
</footer>

<!-- Quiz JavaScript -->
<script>
    let startBtn = document.getElementById('start-btn');
    startBtn.onclick=()=>{
        document.getElementById('start-card').classList.add('hidden');
        document.getElementById('questionContainer').classList.remove('hidden');
        let currentQuestion = getQuestion(currentQuestionIndex);
        displayQuestion(currentQuestion);
    }
</script>
</body>
</html>

