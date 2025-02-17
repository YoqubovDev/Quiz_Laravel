<x-header></x-header>
<body class="bg-gray-100">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<div class="min-h-screen flex">
    <!-- Sidebar -->
    <x-dashboard.sidebar></x-dashboard.sidebar>
    <!-- Main Content -->
    <div class="flex-1">
        <!-- Top Navigation -->
        <x-dashboard.navbar></x-dashboard.navbar>
        <!-- Main Content Area -->
        <main class="p-6 lg:p-8">
            <h1 class="text-lg">{{ $quiz->title }}</h1>
            <p>{{ $quiz->description }}</p>
            <h1>Questions:</h1>
            <ol>
                @foreach($questions as $question)
                    <li>
                        {{ $question['question'] }}
                        <h3>{{ $question['correct_answer'] }} ✅</h3>
                        <h3>{{ $question['user_answer'] }} {{ $question['is_correct'] ? '✅' : '❌'}} </h3>
                    </li>
                @endforeach
            </ol>
        </main>
    </div>
</div>
<script>
    // Progress Chart
    const progressCtx = document.getElementById('progressChart').getContext('2d');
    new Chart(progressCtx, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
            datasets: [{
                label: 'Average Score',
                data: [65, 70, 75, 80, 85, 90],
                borderColor: 'rgb(59, 130, 246)',
                tension: 0.1
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true,
                    max: 100
                }
            }
        }
    });

    // Category Chart
    const categoryCtx = document.getElementById('categoryChart').getContext('2d');
    new Chart(categoryCtx, {
        type: 'radar',
        data: {
            labels: ['JavaScript', 'HTML', 'CSS', 'React', 'Node.js', 'Python'],
            datasets: [{
                label: 'Performance',
                data: [85, 90, 88, 82, 75, 80],
                backgroundColor: 'rgba(59, 130, 246, 0.2)',
                borderColor: 'rgb(59, 130, 246)',
                pointBackgroundColor: 'rgb(59, 130, 246)',
            }]
        },
        options: {
            scales: {
                r: {
                    beginAtZero: true,
                    max: 100
                }
            }
        }
    });
</script>
<x-main.footer></x-main.footer>
