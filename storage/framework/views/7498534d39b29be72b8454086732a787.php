<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\AppLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header', null, []); ?> 
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            <?php echo e(__('Data Pegawai')); ?>

        </h2>
     <?php $__env->endSlot(); ?>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <?php if(session('success')): ?>
                        <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50" role="alert">
                            <?php echo e(session('success')); ?>

                        </div>
                    <?php endif; ?>
                    
                    <a href="<?php echo e(route('pegawai.create')); ?>"
                        class="inline-flex items-center px-4 py-2 mb-4 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-blue-500 border border-transparent rounded-md hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring ring-blue-300 disabled:opacity-25">
                        Tambah Pegawai
                    </a>

                    
                    <div class="overflow-x-auto">
                        <table class="min-w-full text-sm bg-white divide-y-2 divide-gray-200">
                            <thead class="text-left">
                                <tr>
                                    <th class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap">Nama Lengkap</th>
                                    <th class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap">Jabatan</th>
                                    <th class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap">Divisi</th>
                                    <th class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap">Email</th>
                                </tr>
                            </thead>

                            <tbody class="divide-y divide-gray-200">
                                <?php $__empty_1 = true; $__currentLoopData = $pegawais; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pegawai): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap">
                                            <?php echo e($pegawai->nama); ?></td>
                                        <td class="px-4 py-2 text-gray-700 whitespace-nowrap">
                                            <?php echo e($pegawai->jabatan->nama_jabatan); ?></td>
                                            <td class="px-4 py-2 text-gray-700 whitespace-nowrap">
                                            <?php echo e($pegawai->divisi->nama_divisi); ?></td>
                                        <td class="px-4 py-2 text-gray-700 whitespace-nowrap"><?php echo e($pegawai->email); ?></td>
                                        <td class="flex justify-end gap-2 px-4 py-2 whitespace-nowrap">
                                            <a href="<?php echo e(route('pegawai.edit', $pegawai)); ?>"
                                                class="inline-block px-4 py-2 text-xs font-medium text-white bg-indigo-600 rounded hover:bg-indigo-700">
                                                Edit
                                            </a>
                                            <form method="POST" action="<?php echo e(route('pegawai.destroy', $pegawai)); ?>"
                                                onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>
                                                <button type="submit"
                                                    class="inline-block px-4 py-2 text-xs font-medium text-white bg-red-600 rounded hover:bg-red-700">
                                                    Hapus
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr>
                                        <td colspan="5" class="py-4 text-center text-gray-500">Data belum tersedia.
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>

                    
                    <div class="mt-4">
                        <?php echo e($pegawais->links()); ?>

                    </div>

                </div>
            </div>
        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php /**PATH C:\laragon\www\test-sl-sarahannata\resources\views/pegawai/index.blade.php ENDPATH**/ ?>