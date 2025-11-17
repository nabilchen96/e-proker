<x-filament-widgets::widget>
    <x-filament::section class="overflow-x-auto">
        @if(empty($data))
            <div class="p-4 text-center text-gray-500">
                Tidak ada program untuk tahun {{ $activeYearValue }}
            </div>
        @else
            <div class="mb-4">
                <h3 class="text-lg font-semibold">Timeline Program {{ $activeYearValue }}</h3>
            </div>

            <table class="w-max border-collapse text-sm">
                <thead class="sticky top-0 bg-white z-10">
                    {{-- Header Bulan --}}
                    <tr>
                        <th colspan="2" class="border p-2 bg-gray-100">Unit</th>
                        @foreach ($months as $m => $name)
                            <th class="border p-2 text-center bg-gray-100 font-semibold" colspan="4">
                                {{ $name }} {{ $activeYearValue }}
                            </th>
                        @endforeach
                    </tr>

                    {{-- Header Minggu --}}
                    <tr>
                        <th colspan="2" class="border p-2 bg-gray-100 sticky left-0 z-20"></th>
                        @foreach ($months as $m => $name)
                            @foreach ($weeks as $w)
                                <th class="border p-2 text-center bg-gray-50 text-xs font-medium">
                                    {{ $w }}
                                </th>
                            @endforeach
                        @endforeach
                    </tr>
                </thead>

                <tbody>
                    @foreach ($data as $unitName => $programs)
                        {{-- Unit Header --}}
                        <tr class="group">
                            <td colspan="2" class="border p-2 font-semibold bg-gray-50">
                                {{ $unitName }}
                            </td>
                            @foreach ($months as $m => $name)
                                @foreach ($weeks as $w)
                                    <td class="border p-1 bg-gray-50 group-hover:bg-gray-100 transition-colors"></td>
                                @endforeach
                            @endforeach
                        </tr>

                        {{-- Program Rows --}}
                        @foreach ($programs as $p)
                            @php
                                // Hitung index absolut (1-60)
                                $startIndex = (($p->start_month - 1) * 4) + $p->start_week;
                                $endIndex = (($p->end_month - 1) * 4) + $p->end_week;
                                
                                // Validasi agar tidak melebihi batas
                                $startIndex = max(1, min(60, $startIndex));
                                $endIndex = max(1, min(60, $endIndex));
                                
                                // Pastikan start tidak lebih besar dari end
                                if ($startIndex > $endIndex) {
                                    $temp = $startIndex;
                                    $startIndex = $endIndex;
                                    $endIndex = $temp;
                                }
                                
                                $programColor = $this->getProgramColor($p->id);
                            @endphp

                            <tr class="group hover:bg-gray-50 transition-colors">
                                {{-- Empty cell untuk indentasi --}}
                                <td class="border p-2 bg-gray-10 sticky left-0 z-5 group-hover:bg-gray-50"></td>
                                
                                {{-- Nama Program - Lebih Sempit dan Wrap --}}
                                <td style="width: 250px !important;" class="border p-2 align-top break-words whitespace-normal" title="{{ $p->title }}">
                                    {{ $p->title }}
                                </td>

                                {{-- Timeline Bars --}}
                                @foreach ($months as $month => $name)
                                    @foreach ($weeks as $index => $weekLabel)
                                        @php
                                            $cellIndex = (($month - 1) * 4) + ($index + 1);
                                            $isFilled = $cellIndex >= $startIndex && $cellIndex <= $endIndex;
                                            $isStart = $cellIndex === $startIndex;
                                            $isEnd = $cellIndex === $endIndex;
                                        @endphp

                                        <td class="border p-1 relative group/cell">
                                            @if ($isFilled)
                                                <div style="background-color:aqua !important;" class="{{ $programColor }} h-6 rounded 
                                                    @if($isStart) rounded-l-none @endif
                                                    @if($isEnd) rounded-r-none @endif
                                                    @if(!$isStart && !$isEnd) rounded-none @endif
                                                    transition-all group-hover/cell:opacity-80"
                                                    title="{{ $p->title }} - {{ $name }} {{ $weekLabel }}">
                                                </div>
                                                
                                                {{-- Tooltip untuk start --}}
                                                @if ($isStart)
                                                    <div class="absolute bottom-full left-1/2 transform -translate-x-1/2 mb-1 hidden group-hover/cell:block z-30">
                                                        <div class="bg-black text-white text-xs rounded py-1 px-2 whitespace-nowrap">
                                                            Start: {{ $name }} {{ $weekLabel }}
                                                        </div>
                                                    </div>
                                                @endif
                                                
                                                {{-- Tooltip untuk end --}}
                                                @if ($isEnd)
                                                    <div class="absolute top-full left-1/2 transform -translate-x-1/2 mt-1 hidden group-hover/cell:block z-30">
                                                        <div class="bg-black text-white text-xs rounded py-1 px-2 whitespace-nowrap">
                                                            End: {{ $name }} {{ $weekLabel }}
                                                        </div>
                                                    </div>
                                                @endif
                                            @endif
                                        </td>
                                    @endforeach
                                @endforeach
                            </tr>
                        @endforeach
                    @endforeach
                </tbody>
            </table>
        @endif
    </x-filament::section>
</x-filament-widgets::widget>