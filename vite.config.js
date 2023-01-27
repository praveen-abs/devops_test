import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue'

export default defineConfig({
    plugins: [
         vue(),
        laravel({
            input: ['resources/js/app.js',
                    'resources/js/hrms/modules/leave_module/OrgLeaveBalance.js',
                    'resources/js/hrms/modules/profile_pages/EmployeeDocumentsManager.js'
            ],
            refresh: true,
        }),
    ],
});
