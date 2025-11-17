<x-filament-widgets::widget>
    <x-filament::section>
        <div class="overflow-x-auto">
            <table class="min-w-full border-collapse" style="table-layout: fixed;">
                <colgroup>
                    <col style="width: 50px;">  <!-- No -->
                    <col style="width: 400px;"> <!-- Uraian -->
                    <col style="width: 150px;"> <!-- Biaya -->
                    @foreach ($this->getMonths() as $month)
                        @foreach ($month['weeks'] as $week)
                            <col style="width: 40px;"> <!-- Minggu -->
                        @endforeach
                    @endforeach
                </colgroup>
                
                <thead class="bg-gray-50">
                    <!-- Baris 1: Bulan -->
                    <tr>
                        <th rowspan="2" class="border px-4 py-3 text-center font-semibold text-gray-700 bg-gray-100">No.</th>
                        <th rowspan="2" class="border px-4 py-3 text-center font-semibold text-gray-700 bg-gray-100">Uraian</th>
                        <th rowspan="2" class="border px-4 py-3 text-center font-semibold text-gray-700 bg-gray-100">Biaya</th>
                        
                        @foreach ($this->getMonths() as $month)
                            <th colspan="{{ count($month['weeks']) }}" class="border px-2 py-3 text-center font-semibold text-gray-700 bg-blue-50">
                                {{ $month['name'] }} {{ $month['year'] }}
                            </th>
                        @endforeach
                    </tr>
                    
                    <!-- Baris 2: Minggu -->
                    <tr>
                        @foreach ($this->getMonths() as $month)
                            @foreach ($month['weeks'] as $week)
                                <th class="border px-2 py-2 text-center text-sm font-medium text-gray-600 bg-blue-25">
                                    W{{ $week }}
                                </th>
                            @endforeach
                        @endforeach
                    </tr>
                </thead>

                <tbody class="bg-white">
                    @php
                        $currentGroup = null;
                        $rowNumber = 1;
                    @endphp

                    @foreach ($this->getPrograms() as $program)
                        @php
                            $start = \Carbon\Carbon::parse($program->mulai);
                            $end = \Carbon\Carbon::parse($program->selesai);
                            $programGroup = $program->unit->unit ?? 'Umum';
                        @endphp

                        <!-- Group Header -->
                        @if ($programGroup != $currentGroup)
                            <tr class="bg-gray-50">
                                <td class="border px-4 py-3 font-bold text-gray-800 text-sm" colspan="2">
                                    <strong>{{ $rowNumber }}. {{ $programGroup }}</strong>
                                </td>
                                <td class="border px-4 py-3"></td>
                                @foreach ($this->getMonths() as $month)
                                    @foreach ($month['weeks'] as $week)
                                        <td class="border px-2 py-2"></td>
                                    @endforeach
                                @endforeach
                            </tr>
                            @php
                                $currentGroup = $programGroup;
                                $subRowNumber = 1;
                            @endphp
                        @endif

                        <!-- Program Row -->
                        <tr class="hover:bg-gray-50">
                            <td class="border px-4 py-2 text-sm text-gray-600 text-center">
                                {{ $rowNumber }}.{{ $subRowNumber }}
                            </td>
                            <td class="border px-4 py-2 text-sm text-gray-700">
                                {{ $program->title }}
                            </td>
                            <td class="border px-4 py-2 text-sm text-gray-600 text-right">
                                @if($program->biaya)
                                    Rp {{ number_format($program->biaya, 0, ',', '.') }}
                                @endif
                            </td>

                            @foreach ($this->getMonths() as $month)
                                @foreach ($month['weeks'] as $week)
                                    <td class="border px-2 py-2 text-center relative group">
                                        @if($this->isInWeek($start, $end, $month['num'], $week))
                                            <div class="w-6 h-6 bg-primary-500 rounded mx-auto flex items-center justify-center cursor-help"
                                                 title="{{ $program->nama_program }}\nPeriode: {{ $start->format('d M Y') }} - {{ $end->format('d M Y') }}\nMinggu: {{ $week }}\nBulan: {{ $month['name'] }}">
                                                <span class="text-xs text-white font-bold">•</span>
                                            </div>
                                        @endif
                                    </td>
                                @endforeach
                            @endforeach
                        </tr>

                        @php
                            $subRowNumber++;
                            $rowNumber++;
                        @endphp
                    @endforeach
                </tbody>
            </table>
        </div>

        @if($this->getPrograms()->count() == 0)
            <div class="text-center py-8 text-gray-500">
                Tidak ada program yang ditemukan.
            </div>
        @endif
    </x-filament::section>
</x-filament-widgets::widget>

<style>
    .border {
        border: 1px solid #e5e7eb;
    }
    
    .bg-blue-25 {
        background-color: #f0f9ff;
    }
    
    table {
        min-width: 1400px;
    }
</style>