@extends('layout.master')

@section('title', 'Dashboard')

@section('content')
    <div class="px-3 pb-3" x-data="dashboard">
        <div class="ui message">
            <div class="header">
                Sugeng Rawuh, {{ Auth::user()->name }}
            </div>
            <p>Aplikasi ini sedang tahap pengembangan, beberapa kesalahan mungkin terjadi. Silakan hubungi <a
                    href="https://wa.me/+6281281910513/?text=Banh webnya error banh">backend team development</a>.</p>
        </div>
        <div class="ui three stackable cards">
            <div class="ui card" style="width: 10%;">
                <div class="content">
                    <div class="center aligned header">{{ $accessMaster }}</div>
                </div>
                <div class="extra content">
                    <div class="center aligned">
                        Access Master
                    </div>
                </div>
            </div>
            <div class="ui card" style="width: 10%;">
                <div class="content">
                    <div class="center aligned header">{{ $user }}</div>
                </div>
                <div class="extra content">
                    <div class="center aligned">
                        User Active
                    </div>
                </div>
            </div>
        </div>

        <button :class="isLoading ? 'ui labeled icon positive button mt-3' : 'ui positive button mt-3'"
                @click="syncData"
        >
            <template x-if="isLoading">
                <i class="loading spinner icon"></i>
            </template>
            Sinkronisasi Data GoKampus
        </button>
    </div>
@endsection

@section('scripts')
    <script>
        const dashboard = () => {
            return {
                isLoading: false,
                syncData() {
                    this.isLoading = true
                    axios.get('/api/sync-data')
                        .then(() => {
                            this.isLoading = false
                            alert('Sinkronisasi data berhasil!')
                        })
                        .catch(() => {
                            this.isLoading = false
                            alert('Sinkronisasi data gagal!')
                        })
                }
            }
        }
    </script>
@endsection
