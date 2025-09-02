document.addEventListener('livewire:navigated', () => {
    // Chart.js Sales Chart
    const ctx = document.getElementById('salesChart')?.getContext('2d');
    const labels = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'];
    const data = {
        labels: labels,
        datasets: [
            {
                label: 'Penjualan (Rp)',
                data: [1200000, 1900000, 3000000, 5000000, 2300000, 3100000, 4500000],
                fill: true,
                tension: 0.4,
            },
        ],
    };

    const getChartOptions = () => {
        const isDark = document.documentElement.classList.contains('dark');
        const gridColor = isDark ? 'rgba(255, 255, 255, 0.1)' : 'rgba(0, 0, 0, 0.1)';
        const textColor = isDark ? '#E5E7EB' : '#374151';

        return {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true,
                    grid: {
                        color: gridColor,
                    },
                    ticks: {
                        color: textColor,
                        callback: function (value) {
                            return 'Rp ' + value / 1000000 + 'Jt';
                        },
                    },
                },
                x: {
                    grid: {
                        display: false,
                    },
                    ticks: {
                        color: textColor,
                    },
                },
            },
            plugins: {
                legend: {
                    display: false,
                },
                tooltip: {
                    callbacks: {
                        label: function (context) {
                            let label = context.dataset.label || '';
                            if (label) {
                                label += ': ';
                            }
                            if (context.parsed.y !== null) {
                                label += new Intl.NumberFormat('id-ID', {
                                    style: 'currency',
                                    currency: 'IDR',
                                }).format(context.parsed.y);
                            }
                            return label;
                        },
                    },
                },
            },
        };
    };

    const getChartConfig = () => {
        const isDark = document.documentElement.classList.contains('dark');
        const mainColor = '#22C55E';
        const mainColorDark = '#4ADE80';
        const borderColor = isDark ? mainColorDark : mainColor;
        const backgroundColor = isDark ? 'rgba(74, 222, 128, 0.2)' : 'rgba(34, 197, 94, 0.2)';

        const config = {
            type: 'line',
            data: data,
            options: getChartOptions(),
        };

        config.data.datasets[0].borderColor = borderColor;
        config.data.datasets[0].backgroundColor = backgroundColor;

        return config;
    };

    // Create and store the chart instance
    if (ctx) {
        window.salesChartInstance = new Chart(ctx, getChartConfig());
    }

    // Function to update chart theme
    function updateChartTheme(chart) {
        chart.options = getChartOptions();
        const isDark = document.documentElement.classList.contains('dark');
        const mainColor = '#22C55E';
        const mainColorDark = '#4ADE80';
        const borderColor = isDark ? mainColorDark : mainColor;
        const backgroundColor = isDark ? 'rgba(74, 222, 128, 0.2)' : 'rgba(34, 197, 94, 0.2)';
        chart.data.datasets[0].borderColor = borderColor;
        chart.data.datasets[0].backgroundColor = backgroundColor;
        chart.update();
    }
});
