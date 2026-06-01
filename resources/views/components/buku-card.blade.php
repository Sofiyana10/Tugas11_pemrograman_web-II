<div class="card mb-3">
    <div class="card-body">
        <div class="row">
            <div class="col-md-2 text-center">
                <i class="bi bi-book-fill text-primary"
                    style="font-size: 4rem;">
                </i>
                <div class="mt-2">
                    <span class="badge bg-info">
                        {{ $buku->kategori }}
                    </span>
                </div>
            </div>

            <div class="col-md-7">
                <h5>{{ $buku->judul }}</h5>

                <p class="text-muted mb-2">
                    <i class="bi bi-person"></i>
                    {{ $buku->pengarang }}
                </p>

                <h6 class="text-success">
                    {{ $buku->harga_format }}
                </h6>
            </div>

            <div class="col-md-3 text-end">

                @if ($buku->stok > 0)

                <span class="badge bg-success">
                    Tersedia
                </span>

                <p class="small mt-2">
                    Stok : {{ $buku->stok }}
                </p>

                @else

                <span class="badge bg-danger">
                    Habis
                </span>

                @endif

                @if ($showActions)

                <div class="mt-3">
                    <a href="{{ route('buku.show', $buku->id) }}"
                        class="btn btn-sm btn-primary">
                        Detail
                    </a>

                    <a href="{{ route('buku.edit', $buku->id) }}"
                        class="btn btn-sm btn-warning">
                        Edit
                    </a>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>