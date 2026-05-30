<x-admin-layout>
    <div class="container-fluid py-2">
        <div class="d-flex justify-content-between align-items-center mb-5 mt-2">
            <div>
                <h2 class="fw-bold mb-2 text-white" style="font-family: 'Orbitron', sans-serif;">USER <span class="text-info">ANALYTICS</span></h2>
                <p class="tech-text text-info mb-0">DATABASE // REGISTERED_ACCOUNTS</p>
            </div>
            <a href="{{ route('admin.dashboard') }}" class="btn btn-sm btn-outline-info px-4 tech-text">
                <i class="bi bi-arrow-left me-1"></i> BACK TO DASHBOARD
            </a>
        </div>

        <!-- Grafik Pertumbuhan User -->
        <div class="row mb-5">
            <div class="col-12">
                <div class="card admin-card p-4 p-md-5 shadow-lg" style="border-color: rgba(13,202,240,0.3);">
                    <h5 class="fw-bold text-white mb-4" style="font-family: 'Orbitron', sans-serif; letter-spacing: 1px;">
                        <i class="bi bi-graph-up-arrow me-2 text-info"></i> USER GROWTH ({{ date('Y') }})
                    </h5>
                    <div style="height: 300px; width: 100%;">
                        <canvas id="userChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tabel User -->
        <div class="card admin-card p-4 p-md-5 shadow-lg">
            <h5 class="fw-bold text-white mb-4 mt-2" style="font-family: 'Orbitron', sans-serif; letter-spacing: 1px;">
                <i class="bi bi-person-lines-fill me-2 text-danger"></i> ACCOUNT DATABASE
            </h5>
            <div class="table-responsive pb-3">
                <table class="table table-admin align-middle text-nowrap mt-2">
                    <thead>
                        <tr>
                            <th>SYS_ID</th>
                            <th>NAMA USER</th>
                            <th>EMAIL ADDRESS</th>
                            <th>TANGGAL REGISTRASI</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($users as $user)
                        <tr>
                            <td class="tech-text text-danger">USR-{{ str_pad($user->id, 4, '0', STR_PAD_LEFT) }}</td>
                            <td class="fw-bold text-white fs-6">{{ $user->name }}</td>
                            <td class="text-secondary">{{ $user->email }}</td>
                            <td>
                                <span class="badge bg-transparent border border-info text-info tech-text px-2 py-1">
                                    {{ $user->created_at->format('d M Y - H:i') }}
                                </span>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center py-5 text-secondary tech-text">NO REGISTERED USERS FOUND.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            <div class="d-flex justify-content-center mt-5 mb-3 pagination-custom">
                {{ $users->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>

    <!-- Script Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const ctx = document.getElementById('userChart').getContext('2d');
            
            const labels = {!! json_encode($labels) !!};
            const dataPoint = {!! json_encode($data) !!};

            // Gradient Neon Cyan (Cyan ke Transparan)
            let gradient = ctx.createLinearGradient(0, 0, 0, 400);
            gradient.addColorStop(0, 'rgba(13, 202, 240, 0.6)');
            gradient.addColorStop(1, 'rgba(13, 202, 240, 0.0)');

            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'New Registrations',
                        data: dataPoint,
                        borderColor: '#0dcaf0',
                        backgroundColor: gradient,
                        borderWidth: 3,
                        pointBackgroundColor: '#141414',
                        pointBorderColor: '#0dcaf0',
                        pointBorderWidth: 2,
                        pointRadius: 5,
                        pointHoverRadius: 7,
                        fill: true,
                        tension: 0.4 // Garis kurva melengkung futuristik
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: { display: false },
                        tooltip: {
                            backgroundColor: 'rgba(0,0,0,0.8)',
                            titleColor: '#0dcaf0',
                            titleFont: { family: 'Orbitron', size: 13 },
                            bodyFont: { family: 'Poppins', size: 14 },
                            borderColor: '#0dcaf0',
                            borderWidth: 1,
                            padding: 10
                        }
                    },
                    scales: {
                        x: {
                            grid: { color: 'rgba(255,255,255,0.05)', borderColor: 'rgba(255,255,255,0.1)' },
                            ticks: { color: '#a0a0a0', font: { family: 'Orbitron' } }
                        },
                        y: {
                            beginAtZero: true,
                            grid: { color: 'rgba(255,255,255,0.05)', borderColor: 'rgba(255,255,255,0.1)' },
                            ticks: { color: '#a0a0a0', stepSize: 1, font: { family: 'Orbitron' } }
                        }
                    }
                }
            });
        });
    </script>
</x-admin-layout>