@if($filteredData->isEmpty())
    <p>No data available for the selected filters.</p>
@else
    <ul>
        @foreach($filteredData as $item)
            <li>
                <label class="cb-container">
                    <input type="checkbox" class="filterAvailability" value="{{$item->nama}}"> <span class="text-small">{{$item->nama}}</span>
                    <span class="checkmark"></span>
                </label>
            </li>
        @endforeach
    </ul>
@endif
