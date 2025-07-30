<?php if (isset($component)) { $__componentOriginalf90dc8cdc9bff2ac17df09bcc6e0a0ea = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf90dc8cdc9bff2ac17df09bcc6e0a0ea = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.layouts_dash','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.layouts_dash'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>


    <div class="container mx-auto p-6">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Card 1 -->
            <div class="bg-white shadow-lg rounded-lg p-6">
                <h3 class="text-xl font-semibold">Card 1</h3>
                <p class="mt-2 text-gray-600">Contenuto card 1</p>
            </div>

            <!-- Card 2 -->
            <div class="bg-white shadow-lg rounded-lg p-6">
                <h3 class="text-xl font-semibold">Card 2</h3>
                <p class="mt-2 text-gray-600">Contenuto card 2</p>
            </div>

            <!-- Card 3 -->
            <div class="bg-white shadow-lg rounded-lg p-6">
                <h3 class="text-xl font-semibold">Card 3</h3>
                <p class="mt-2 text-gray-600">Contenuto card 3</p>
            </div>

            <!-- Card 4 -->
            <div class="bg-white shadow-lg rounded-lg p-6">
                <h3 class="text-xl font-semibold">Card 4</h3>
                <p class="mt-2 text-gray-600">Contenuto card 4</p>
            </div>
        </div>

        <!-- Grafico a Torta -->
        <div class="mt-8 bg-white shadow-lg rounded-lg p-6">
            <h3 class="text-2xl font-semibold mb-4">Grafico a Torta</h3>
            <canvas id="pieChart"></canvas>
        </div>

        <!-- Istogramma -->
        <div class="mt-8 bg-white shadow-lg rounded-lg p-6">
            <h3 class="text-2xl font-semibold mb-4">Istogramma</h3>
            <canvas id="barChart"></canvas>
        </div>
    </div>

    <script>
        // Grafico a Torta
        var pieChartCtx = document.getElementById('pieChart').getContext('2d');
        var pieChart = new Chart(pieChartCtx, {
            type: 'pie',
            data: {
                labels: ['Red', 'Blue', 'Yellow', 'Green'],
                datasets: [{
                    data: [300, 50, 100, 200],
                    backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#4CAF50'],
                    hoverBackgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#4CAF50']
                }]
            }
        });

        // Istogramma
        var barChartCtx = document.getElementById('barChart').getContext('2d');
        var barChart = new Chart(barChartCtx, {
            type: 'bar',
            data: {
                labels: ['January', 'February', 'March', 'April', 'May'],
                datasets: [{
                    label: 'Variazione',
                    data: [65, 59, 80, 81, 56],
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>

     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf90dc8cdc9bff2ac17df09bcc6e0a0ea)): ?>
<?php $attributes = $__attributesOriginalf90dc8cdc9bff2ac17df09bcc6e0a0ea; ?>
<?php unset($__attributesOriginalf90dc8cdc9bff2ac17df09bcc6e0a0ea); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf90dc8cdc9bff2ac17df09bcc6e0a0ea)): ?>
<?php $component = $__componentOriginalf90dc8cdc9bff2ac17df09bcc6e0a0ea; ?>
<?php unset($__componentOriginalf90dc8cdc9bff2ac17df09bcc6e0a0ea); ?>
<?php endif; ?><?php /**PATH /home/lovix/PhpstormProjects/AppLaravel/resources/views/pages/dashboard.blade.php ENDPATH**/ ?>