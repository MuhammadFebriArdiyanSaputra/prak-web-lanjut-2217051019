
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama:</label>
                    <input type="text" name="nama" class="form-control" id="nama">
                    @error('nama')
                        <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="npm" class="form-label">NPM:</label>
                    <input type="text" name="npm" class="form-control" id="npm">
                    @error('npm')
                        <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="id_kelas" class="form-label">Kelas:</label>
                    <select name="kelas_id" id="kelas_id">
                        @foreach($kelas as $kelasItem) 
                            <option value="{{$kelasItem->id}}">{{$kelasItem->nama_kelas}}</option>
                        @endforeach
                    </select>
                    @error('npm')
                        <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary w-100">Submit</button>
