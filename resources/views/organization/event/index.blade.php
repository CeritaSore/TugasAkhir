<x-headerassets title="Acara dan Kegiatan"></x-headerassets>
<h2>halo</h2>
<button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">create event</button>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Create Event</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="#">
                    @csrf
                    <label for="#NamaEvent">Nama Event</label>
                    <input id="NamaEvent" type="text" name="nama">
                    <br>
                    <label for="#eventType">Tipe Event</label>
                    <select name="event_type" id="eventType">
                        <option value="1">open tender</option>
                        <option value="2">open recruitment</option>
                        <option value="3">event workshop</option>
                    </select>
                    <br>
                    <textarea name="deskripsi" id="deskripsi" cols="30" rows="10" placeholder="deskripsi"></textarea>
                    <label for="tglmulai">Tanggal Mulai</label>
                    <input type="date" name="tglmulai" id="tglmulai">
                    <label for="tglselesai">Tanggal selesai</label>
                    <input type="date" name="tglselesai" id="tglselesai">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

<!-- Nav tabs -->
<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item" role="presentation">
        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button"
            role="tab" aria-controls="home" aria-selected="true">Draft</button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button"
            role="tab" aria-controls="profile" aria-selected="false">live</button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link" id="messages-tab" data-bs-toggle="tab" data-bs-target="#messages" type="button"
            role="tab" aria-controls="messages" aria-selected="false">done</button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link" id="settings-tab" data-bs-toggle="tab" data-bs-target="#settings" type="button"
            role="tab" aria-controls="settings" aria-selected="false">upcoming</button>
    </li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    <div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab" tabindex="0">...</div>
    <div class="tab-pane" id="profile" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">...</div>
    <div class="tab-pane" id="messages" role="tabpanel" aria-labelledby="messages-tab" tabindex="0">...</div>
    <div class="tab-pane" id="settings" role="tabpanel" aria-labelledby="settings-tab" tabindex="0">this upcoming
    </div>
</div>
<x-footerassets></x-footerassets>
