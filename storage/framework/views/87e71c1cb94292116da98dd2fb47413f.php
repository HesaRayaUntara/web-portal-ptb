<?php $__env->startSection('title', 'Admin Dashboard'); ?>

<?php $__env->startSection('content'); ?>
<div class="rounded-section border border-borderSoft bg-white shadow-soft">
    <div class="flex flex-col gap-8 lg:flex-row lg:items-stretch">
        <?php echo $__env->make('partials.admin-sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <main class="flex-1 space-y-8 p-6 lg:p-10">
            <header class="relative overflow-hidden rounded-card bg-gradient-to-br from-primary via-primaryDark to-primary px-6 py-5 text-white shadow-soft">
                <div class="relative z-10 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                    <div class="flex items-center gap-4">
                        <div class="flex h-12 w-12 items-center justify-center rounded-full bg-white/20 backdrop-blur-sm">
                            <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-white/90">Selamat Datang Kembali</p>
                            <p class="text-xl font-bold text-white"><?php echo e(\App\Models\Admin::find(session('admin_id'))->username ?? 'Admin'); ?></p>
                        </div>
                    </div>
                    <div class="flex items-center gap-4 sm:border-l sm:border-white/20 sm:pl-4">
                        <div class="hidden sm:block">
                            <p class="text-xs font-medium text-white/80" id="current-date"></p>
                            <p class="text-lg font-bold text-white" id="current-time"></p>
                        </div>
                        <div class="flex items-center gap-2 rounded-lg bg-white/15 px-3 py-2 backdrop-blur-sm">
                            <svg class="h-4 w-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span class="text-xs font-semibold text-white">Online</span>
                        </div>
                    </div>
                </div>
                
                
                <div class="absolute -right-8 -top-8 h-32 w-32 rounded-full bg-white/5"></div>
                <div class="absolute -bottom-4 -left-4 h-24 w-24 rounded-full bg-white/5"></div>
            </header>

            
            <div class="grid grid-cols-2 gap-3 md:gap-4 lg:grid-cols-4">
                
                <a href="<?php echo e(route('admin.dosen.index')); ?>" class="group relative overflow-hidden rounded-lg bg-gradient-to-br bg-orange-600 shadow-md transition-all hover:scale-[1.02] hover:shadow-lg">
                    <div class="relative p-4">
                        <div class="flex items-start justify-between">
                            <div class="flex-1">
                                <p class="text-3xl font-bold text-white"><?php echo e($jumlahDosen ?? \App\Models\Dosen::count()); ?></p>
                                <p class="mt-1 text-sm font-semibold text-white">Dosen</p>
                            </div>
                            <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-white/20">
                                <svg class="h-5 w-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="bg-orange-700/50 px-4 py-2">
                        <div class="flex items-center justify-between text-xs font-semibold text-white transition">
                            <span>View Details</span>
                            <span>></span>
                        </div>
                    </div>
                </a>

                
                <a href="<?php echo e(route('admin.staf.index')); ?>" class="group relative overflow-hidden rounded-lg bg-gradient-to-br  bg-blue-600 shadow-md transition-all hover:scale-[1.02] hover:shadow-lg">
                    <div class="relative p-4">
                        <div class="flex items-start justify-between">
                            <div class="flex-1">
                                <p class="text-3xl font-bold text-white"><?php echo e($jumlahStaf ?? \App\Models\Staf::count()); ?></p>
                                <p class="mt-1 text-sm font-semibold text-white">Staf</p>
                            </div>
                            <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-white/20">
                                <svg class="h-5 w-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="bg-blue-700/50 px-4 py-2">
                        <div class="flex items-center justify-between text-xs font-semibold text-white transition">
                            <span>View Details</span>
                            <span>></span>
                        </div>
                    </div>
                </a>

                
                <a href="<?php echo e(route('admin.berita.index')); ?>" class="group relative overflow-hidden rounded-lg bg-gradient-to-br bg-yellow-500 shadow-md transition-all hover:scale-[1.02] hover:shadow-lg">
                    <div class="relative p-4">
                        <div class="flex items-start justify-between">
                            <div class="flex-1">
                                <p class="text-3xl font-bold text-white"><?php echo e($jumlahBerita ?? \App\Models\Berita::count()); ?></p>
                                <p class="mt-1 text-sm font-semibold text-white">Berita</p>
                            </div>
                            <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-white/20">
                                <svg class="h-5 w-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="bg-yellow-600/50 px-4 py-2">
                        <div class="flex items-center justify-between text-xs font-semibold text-white transition">
                            <span>View Details</span>
                            <span>></span>
                        </div>
                    </div>
                </a>

                
                <a href="<?php echo e(route('admin.galeri.index')); ?>" class="group relative overflow-hidden rounded-lg bg-gradient-to-br from-green-500 to-green-600 shadow-md transition-all hover:scale-[1.02] hover:shadow-lg">
                    <div class="relative p-4">
                        <div class="flex items-start justify-between">
                            <div class="flex-1">
                                <p class="text-3xl font-bold text-white"><?php echo e($jumlahGaleri ?? \App\Models\Galeri::count()); ?></p>
                                <p class="mt-1 text-sm font-semibold text-white">Galeri</p>
                            </div>
                            <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-white/20">
                                <svg class="h-5 w-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="bg-green-700/50 px-4 py-2">
                        <div class="flex items-center justify-between text-xs font-semibold text-white transition">
                            <span>View Details</span>
                            <span>></span>
                        </div>
                    </div>
                </a>
            </div>

            
            <div class="rounded-card border border-borderSoft bg-white shadow-soft" data-admin-id="<?php echo e(session('admin_id') ?? 0); ?>" data-index-url="<?php echo e(route('admin.manage.index')); ?>" data-update-url="<?php echo e(route('admin.manage.update', ':id')); ?>" data-destroy-url="<?php echo e(route('admin.manage.destroy', ':id')); ?>" data-csrf="<?php echo e(csrf_token()); ?>">
                <div class="flex items-center justify-between border-b border-borderSoft px-6 py-4">
                    <h2 class="text-lg font-semibold text-secondary">Kelola Admin</h2>
                    <a href="<?php echo e(route('admin.register')); ?>" class="rounded-lg bg-primary px-2.5 py-1 text-xs font-semibold text-white shadow-soft transition hover:bg-primaryDark">
                        + Tambah
                    </a>
                </div>
                <div class="overflow-x-auto rounded-b-lg">
                    <table class="w-full">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wide text-textMuted">No</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wide text-textMuted">Username</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wide text-textMuted">Tanggal Dibuat</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wide text-textMuted">Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="admin-table-body" class="divide-y divide-borderSoft bg-white">
                            <tr>
                                <td colspan="4" class="px-6 py-8 text-center text-sm text-textMuted">
                                    Memuat data...
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            
            <div class="rounded-card border border-borderSoft bg-white shadow-soft" data-log-url="<?php echo e(route('admin.log-activity')); ?>">
                <div class="flex items-center justify-between border-b border-borderSoft px-6 py-4">
                    <h2 class="text-lg font-semibold text-secondary">Log Aktivitas</h2>
                </div>
                <div class="overflow-x-auto rounded-b-lg">
                    <table class="w-full min-w-[600px]">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-4 py-2 text-left text-xs font-semibold uppercase tracking-wide text-textMuted">Aktivitas</th>
                            </tr>
                        </thead>
                        <tbody id="log-activity-container" class="divide-y divide-borderSoft bg-white">
                            <tr id="log-activity-body">
                                <td colspan="1" class="px-4 py-3 text-center text-xs text-textMuted">
                                    Memuat data...
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                
                <div id="log-activity-pagination" class="mt-4 flex items-center justify-center gap-2 text-sm text-textMuted pb-4"></div>
            </div>
        </main>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        // Update time and date
        function updateDateTime() {
            const now = new Date();
            const options = { 
                timeZone: 'Asia/Jakarta',
                weekday: 'long',
                year: 'numeric', 
                month: 'long', 
                day: 'numeric' 
            };
            const dateStr = now.toLocaleDateString('id-ID', options);
            const timeStr = now.toLocaleTimeString('id-ID', { 
                timeZone: 'Asia/Jakarta',
                hour: '2-digit', 
                minute: '2-digit',
                second: '2-digit',
                hour12: false 
            });
            
            const dateEl = document.getElementById('current-date');
            const timeEl = document.getElementById('current-time');
            if (dateEl) dateEl.textContent = dateStr;
            if (timeEl) timeEl.textContent = timeStr;
        }
        
        // Update immediately and then every second
        updateDateTime();
        setInterval(updateDateTime, 1000);
        
        const toggle = document.getElementById('admin-menu-toggle');
        const panel = document.getElementById('admin-menu-panel');
        if (toggle && panel) {
            toggle.addEventListener('click', () => {
                panel.classList.toggle('hidden');
            });
        }

        // Set height for chart bars
        const chartBars = document.querySelectorAll('[data-height]');
        chartBars.forEach(bar => {
            const height = bar.getAttribute('data-height');
            if (height) {
                bar.style.height = height + 'px';
            }
        });

        // Admin Management CRUD
        const tableBody = document.getElementById('admin-table-body');

        // Load admins - Get URLs from data attributes
        const adminTableContainer = document.querySelector('[data-admin-id]');
        const currentAdminId = parseInt(adminTableContainer?.getAttribute('data-admin-id') || '0');
        const manageIndexUrl = adminTableContainer?.getAttribute('data-index-url') || '';
        const manageDestroyUrl = adminTableContainer?.getAttribute('data-destroy-url') || '';
        const csrfToken = adminTableContainer?.getAttribute('data-csrf') || '';

        // Helper function to update sidebar height
        function updateSidebarHeight() {
            if (window.innerWidth >= 1024) {
                setTimeout(() => {
                    const sidebar = document.getElementById('admin-sidebar');
                    if (sidebar) {
                        const flexContainer = sidebar.closest('.flex.flex-col.gap-8');
                        if (flexContainer) {
                            const mainContent = flexContainer.querySelector('main');
                            if (mainContent) {
                                const mainHeight = mainContent.scrollHeight;
                                const flexContainerHeight = flexContainer.scrollHeight;
                                const targetHeight = Math.max(mainHeight, flexContainerHeight);
                                sidebar.style.height = targetHeight + 'px';
                            }
                        }
                    }
                }, 100);
            }
        }

        function loadAdmins() {
            if (!manageIndexUrl) {
                tableBody.innerHTML = `
                        <tr>
                            <td colspan="4" class="px-6 py-8 text-center text-sm text-red-600">
                                Error: URL tidak ditemukan
                            </td>
                        </tr>
                    `;
                return;
            }

            fetch(manageIndexUrl)
                .then(res => res.json())
                .then(data => {
                    if (data.length === 0) {
                        tableBody.innerHTML = `
                                <tr>
                                    <td colspan="4" class="px-6 py-8 text-center text-sm text-textMuted">
                                        Belum ada data admin
                                    </td>
                                </tr>
                            `;
                        return;
                    }

                    tableBody.innerHTML = data.map((admin, index) => {
                        const isCurrentUser = admin.id == currentAdminId;
                        const usernameEscaped = admin.username.replace(/'/g, "\\'");
                        return `
                                <tr>
                                    <td class="px-6 py-4 text-sm text-textDark">${index + 1}</td>
                                    <td class="px-6 py-4 text-sm font-medium text-textDark">${admin.username}</td>
                                    <td class="px-6 py-4 text-sm text-textMuted">${new Date(admin.created_at).toLocaleString('id-ID', { timeZone: 'Asia/Jakarta', year: 'numeric', month: '2-digit', day: '2-digit', hour: '2-digit', minute: '2-digit', second: '2-digit', hour12: false })}</td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center justify-start gap-2">
                                            <a href="/admin/edit/${admin.id}" class="flex items-center justify-center rounded-lg bg-blue-100 p-2 text-blue-700 transition hover:bg-blue-200" title="Edit">
                                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                            </a>
                                            <button onclick="deleteAdmin(${admin.id}, '${usernameEscaped}')" class="flex items-center justify-center rounded-lg bg-red-100 p-2 text-red-700 transition hover:bg-red-200 ${isCurrentUser ? 'opacity-50 cursor-not-allowed' : ''}" ${isCurrentUser ? 'disabled' : ''} title="Hapus">
                                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            `;
                    }).join('');
                    
                    // Update sidebar height after data is loaded
                    updateSidebarHeight();
                })
                .catch(err => {
                    tableBody.innerHTML = `
                        <tr>
                            <td colspan="4" class="px-6 py-8 text-center text-sm text-red-600">
                                Error memuat data
                            </td>
                        </tr>
                    `;
                });
        }

        // Global function for delete
        window.deleteAdmin = async function(id, username) {
            if (id == currentAdminId) {
                alert('Tidak dapat menghapus akun yang sedang digunakan');
                return;
            }

            if (!confirm(`Yakin ingin menghapus admin "${username}"?`)) return;

            try {
                const response = await fetch(manageDestroyUrl.replace(':id', id), {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': csrfToken
                    }
                });

                const result = await response.json();

                if (result.success) {
                    loadAdmins();
                    // Update sidebar height after admin is deleted
                    setTimeout(updateSidebarHeight, 200);
                } else {
                    alert(result.message || 'Gagal menghapus admin');
                }
            } catch (error) {
                alert('Terjadi kesalahan saat menghapus data');
            }
        };

        // Load admins on page load
        loadAdmins();

        // Load Log Activities
        function loadLogActivities() {
            const logContainer = document.querySelector('[data-log-url]');
            const logUrl = logContainer?.getAttribute('data-log-url') || '';
            const logContainerEl = document.getElementById('log-activity-container');

            if (!logUrl) {
                logContainerEl.innerHTML = `
                    <tr>
                        <td colspan="1" class="px-4 py-6 text-center text-xs text-red-600">
                            Error: URL tidak ditemukan
                        </td>
                    </tr>
                `;
                return;
            }

            fetch(logUrl)
                .then(res => res.json())
                .then(data => {
                    if (data.length === 0) {
                        logContainerEl.innerHTML = `
                            <tr>
                                <td colspan="1" class="px-4 py-6 text-center text-xs text-textMuted">
                                    Belum ada aktivitas yang tercatat
                                </td>
                            </tr>
                        `;
                        return;
                    }

                    logContainerEl.innerHTML = data.map((log, index) => {
                        const timestamp = new Date(log.waktu).toLocaleString('id-ID', { 
                            timeZone: 'Asia/Jakarta', 
                            year: 'numeric', 
                            month: '2-digit', 
                            day: '2-digit', 
                            hour: '2-digit', 
                            minute: '2-digit', 
                            second: '2-digit', 
                            hour12: false 
                        });
                        const aktivitasDenganTimestamp = log.aktivitas + ' pada ' + timestamp;
                        return `
                            <tr class="log-activity-row">
                                <td class="px-4 py-2.5 text-xs text-textDark leading-relaxed">${aktivitasDenganTimestamp}</td>
                            </tr>
                        `;
                    }).join('');
                    
                    // Initialize pagination after data is loaded
                    initLogActivityPagination();
                    
                    // Update sidebar height after data is loaded
                    updateSidebarHeight();
                })
                .catch(err => {
                    logContainerEl.innerHTML = `
                        <tr>
                            <td colspan="1" class="px-4 py-6 text-center text-xs text-red-600">
                                Error memuat data
                            </td>
                        </tr>
                    `;
                });
        }

        // Pagination function for log activity
        function initLogActivityPagination() {
            const container = document.getElementById('log-activity-container');
            if (!container) return;

            const rows = container.querySelectorAll('.log-activity-row');
            const paginationEl = document.getElementById('log-activity-pagination');
            if (!paginationEl || rows.length === 0) {
                if (paginationEl) paginationEl.innerHTML = '';
                return;
            }

            const totalItems = rows.length;
            const itemsPerPage = 10;
            const totalPages = Math.ceil(totalItems / itemsPerPage);
            let currentPage = 1;

            function showPage(page) {
                const start = (page - 1) * itemsPerPage;
                const end = start + itemsPerPage;

                rows.forEach((row, index) => {
                    if (index >= start && index < end) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                });

                // Update pagination display
                let paginationHTML = '';
                if (totalPages > 1) {
                    const prevDisabled = currentPage === 1 ? 'opacity-50 cursor-not-allowed' : 'cursor-pointer hover:text-primary';
                    const nextDisabled = currentPage === totalPages ? 'opacity-50 cursor-not-allowed' : 'cursor-pointer hover:text-primary';
                    
                    paginationHTML = `
                        <button onclick="goToLogActivityPage(${currentPage - 1})" 
                            ${currentPage === 1 ? 'disabled' : ''} 
                            class="${prevDisabled} px-2 py-1 rounded transition">
                            &lt;
                        </button>
                        <span class="px-3">${currentPage} dari ${totalPages}</span>
                        <button onclick="goToLogActivityPage(${currentPage + 1})" 
                            ${currentPage === totalPages ? 'disabled' : ''} 
                            class="${nextDisabled} px-2 py-1 rounded transition">
                            &gt;
                        </button>
                    `;
                }
                paginationEl.innerHTML = paginationHTML;
            }

            // Store pagination state
            window.logActivityPagination = {
                currentPage: 1,
                totalPages: totalPages,
                itemsPerPage: itemsPerPage,
                showPage: showPage
            };

            // Show first page
            showPage(1);
        }

        // Global function to navigate log activity pages
        window.goToLogActivityPage = function(page) {
            const pagination = window.logActivityPagination;
            if (!pagination || page < 1 || page > pagination.totalPages) return;
            
            pagination.currentPage = page;
            
            // Update rows visibility
            const container = document.getElementById('log-activity-container');
            const rows = container.querySelectorAll('.log-activity-row');
            const start = (page - 1) * pagination.itemsPerPage;
            const end = start + pagination.itemsPerPage;

            rows.forEach((row, index) => {
                if (index >= start && index < end) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });

            // Update pagination display
            const paginationEl = document.getElementById('log-activity-pagination');
            if (paginationEl && pagination.totalPages > 1) {
                const prevDisabled = page === 1 ? 'opacity-50 cursor-not-allowed' : 'cursor-pointer hover:text-primary';
                const nextDisabled = page === pagination.totalPages ? 'opacity-50 cursor-not-allowed' : 'cursor-pointer hover:text-primary';
                
                paginationEl.innerHTML = `
                    <button onclick="goToLogActivityPage(${page - 1})" 
                        ${page === 1 ? 'disabled' : ''} 
                        class="${prevDisabled} px-2 py-1 rounded transition">
                        &lt;
                    </button>
                    <span class="px-3">${page} dari ${pagination.totalPages}</span>
                    <button onclick="goToLogActivityPage(${page + 1})" 
                        ${page === pagination.totalPages ? 'disabled' : ''} 
                        class="${nextDisabled} px-2 py-1 rounded transition">
                        &gt;
                    </button>
                `;
            }
            
            // Update sidebar height after pagination
            updateSidebarHeight();
        };

        // Load log activities on page load
        loadLogActivities();
    });
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\web-portal-ptb\resources\views/halaman-admin/admin.blade.php ENDPATH**/ ?>