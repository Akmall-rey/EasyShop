<x-app-layout>
    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <h2 class="text-2xl font-bold mb-4">Top Up Balance</h2>
                    <form method="POST" action="{{ route('topup') }}">
                        @csrf
                        <div>
                            <label for="amount" class="block font-medium">Amount (Rp)</label>
                            <input type="number" id="amount" name="amount" class="form-input w-full mt-1" required>
                        </div>
                        <button type="submit" class="w-full py-2 rounded mt-4 btn btn-success">Top Up</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
