<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Skor</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.15/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 p-8">

    <div class="max-w-xl mx-auto bg-white p-8 rounded shadow-lg">
        <h1 class="text-3xl font-semibold mb-6 text-center">Daftar Skor</h1>

        <table class="w-full mb-6">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b">Nomer</th>
                    <th class="py-2 px-4 border-b">Skor</th>
                </tr>
            </thead>
            <tbody>
                @foreach($scores as $score)
                <tr>
                    <td class="py-2 px-4 border-b text-center">{{ $score->number }}</td>
                    <td class="py-2 px-4 border-b text-center">{{ $score->skor }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <h2 class="text-xl font-semibold mb-4">Cari Skor</h2>
        <form method="post" action="/scores/search" class="mb-6">
            @csrf
            <div class="flex mb-4">
                <label for="skor" class="mr-4 self-center">Skor:</label>
                <input type="text" name="skor" class="py-2 px-4 border rounded focus:outline-none focus:ring focus:border-blue-300 flex-1">
                <button type="submit" class="py-2 px-6 ml-4 bg-blue-500 text-white rounded hover:bg-blue-600 focus:outline-none focus:ring focus:border-blue-300">Cari</button>
            </div>
        </form>

        <h2 class="text-xl font-semibold mb-4">Tambah Skor Baru</h2>
        <form method="post" action="/scores/add" class="mb-6">
            @csrf
            <div class="flex mb-4">
                <label for="nomor" class="mr-4 self-center">Nomer:</label>
                <input type="number" name="nomor" class="py-2 px-4 border rounded focus:outline-none focus:ring focus:border-blue-300 flex-1">
            </div>
            <div class="flex mb-4">
                <label for="skor" class="mr-4 self-center">Skor:</label>
                <input type="number" name="skor" class="py-2 px-4 border rounded focus:outline-none focus:ring focus:border-blue-300 flex-1">
            </div>
            <button type="submit" class="py-2 px-6 bg-green-500 text-white rounded hover:bg-green-600 focus:outline-none focus:ring focus:border-blue-300">Tambah Skor</button>
        </form>
    </div>

</body>

</html>
