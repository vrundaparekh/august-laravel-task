@extends('layouts.admin')
@section('content')
     <!-- Page Heading -->
     <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">convert json to array</h1>
        {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> --}}
    </div>

    @php
        $phpArray = '[{
            "userId": 1,
            "id": 1,
            "title": "sunt aut facere repellat provident occaecati excepturi optioreprehenderit",
            "body": "quia et suscipit\nsuscipit recusandae consequuntur expedita etcum\nreprehenderit molestiae ut ut quas totam\nnostrum rerum est autem sunt rem eveniet architecto"
            },
            {
            "userId": 1,
            "id": 2,
            "title": "qui est esse",
            "body": "est rerum tempore vitae\nsequi sint nihil reprehenderit dolorbeatae ea dolores neque\nfugiat blanditiis voluptate porro vel nihilmolestiae ut reiciendis\nqui aperiam non debitis possimus qui neque nisinulla"
            },
            {
            "userId": 1,
            "id": 3,
            "title": "ea molestias quasi exercitationem repellat qui ipsa sit aut",
            "body": "et iusto sed quo iure\nvoluptatem occaecati omnis eligendi autad\nvoluptatem doloribus vel accusantium quis pariatur\nmolestiae porroeius odio et labore et velit aut"
            }]';

            $object = json_decode($phpArray);
            var_dump($object);
            var_dump(sort($object));// for sorting in ascending

            //object of given title
            $specific_value = 'qui est esse';

            $filtered_array = array_filter($object, function ($obj) use ($specific_value) {
                if($obj->title == $specific_value){
                    return $obj->id;
                }
            });

            print_r($filtered_array);
    @endphp
    </div>
@endsection