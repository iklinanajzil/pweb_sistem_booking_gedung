<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Preferensi Tampilan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
                <h3 class="text-md font-bold mb-4 text-gray-900 dark:text-white">Pengaturan Tampilan</h3>

                <form id="preferences-form">
                    @csrf
                    <div class="mb-4">
                        <label class="block text-sm text-gray-700 dark:text-gray-300 mb-2">Pilihan Tema</label>
                        <select name="theme" id="pref-theme" class="w-full p-2 border rounded dark:bg-gray-700 dark:text-white">
                            <option value="light">Light Mode</option>
                            <option value="dark">Dark Mode</option>
                            <option value="system">Ikuti Sistem (Device)</option>
                        </select>
                    </div>
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Simpan Preferensi</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('preferences-form').addEventListener('submit', async function(e) {
            e.preventDefault();
            const formData = new FormData(this);
            const themeValue = document.getElementById('pref-theme').value;

            try {
                const response = await fetch("{{ route('preferences.save') }}", {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                });

                if (!response.ok) throw new Error('Gagal menghubungi server');
                const result = await response.json();

                if (result.status === 'success') {
                    setCookie('theme', themeValue, 7);

                    alert(result.message);
                    window.location.reload();
                }
            } catch (error) {
                console.error('Error:', error);
                alert('Terjadi kesalahan saat menyimpan preferensi.');
            }
        });
    </script>
</x-app-layout>
