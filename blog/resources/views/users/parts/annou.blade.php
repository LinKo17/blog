@if($admin_setting_data[0]->Announcement ?? "")
    <div class=" bg-dark text-light fs-3 p-3">
        <div class="container" style="word-wrap: break-word">
            {{$admin_setting_data[0]->Announcement}}
        </div>
    </div>
@endif
