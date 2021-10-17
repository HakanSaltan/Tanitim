<template>
    <div>

        <modal name="yeni-ayar-ekle" height="auto">
            <div class="container">
                <h1 class="display-3">Yeni Ayar Ekle</h1><br>
                <form >
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Ayar Anahtarı" v-model="ayarAnahtari">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Ayar Değeri" v-model="ayarDegeri">
                            </div>
                        </div>
                    </div>
                  
                  
                    <div class="row">
                        <div class="col-md-12">
                            <button type="button" class="btn btn-outline-default btn-block" @click="ayarEkle">Kaydet</button>
                        </div>
                    </div>
                </form><br>
            </div>
            
        </modal>

        <modal name="ayar-duzenle" height="auto">
            <div class="container">
                <h1 class="display-3">"{{updateData.ayar_anahtari}}" Sayfasını Düzenle</h1><br>
                
                <form >
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Ayar Anahtarı" v-model="updateData.ayar_anahtari">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Ayar Değeri" v-model="updateData.ayar_degeri">
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-12">
                            <button type="button" class="btn btn-outline-default btn-block" @click="ayarGuncelle">Güncelle</button>
                        </div>
                    </div>
                </form><br>
            </div>
            
        </modal>

        <div class="row">
            <div class="col-8">

            </div>
            <div class="col-4">
                <button type="button" class="btn btn-outline-default" @click="modalAc">Yeni Ayar Ekle</button>
            </div>
        </div>
        <br>
        <div class="table-responsive">
            <table class="table align-items-center">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">Ayar Anahtarı</th>
                        <th scope="col">Ayar Değeri</th>
                        <th scope="col">Ayarlar</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="ayar in ayarlar">
                        
                        <th scope="row">
                            <div class="media align-items-center">
                            
                                <div class="media-body">
                                    <span class="mb-0 text-sm">{{ayar.id}}</span>
                                </div>
                            </div>
                        </th>
                        <th scope="row">
                            <div class="media align-items-center">
                            
                                <div class="media-body">
                                    <span class="mb-0 text-sm">{{ayar.ayar_anahtari}}</span>
                                </div>
                            </div>
                        </th>
                        <th scope="row">
                            <div class="media align-items-center">
                            
                                <div class="media-body">
                                    <span class="mb-0 text-sm">{{ayar.ayar_degeri}}</span>
                                </div>
                            </div>
                        </th>
                      
                    
                        <td class="text-right">
                            <div class="dropdown">
                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                    <a class="dropdown-item" @click="ayarDuzenle(ayar)">Düzenle</a>
                                    <a class="dropdown-item" @click="ayarSil(ayar)" >Sil</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div> 
    </div>
</template>

<script>
const Swal = require('sweetalert2')
export default {
    data(){
        return {
            adi:'örnek',
            ayarAnahtari:'',
            ayarDegeri:'',
            ayarlar:[],
            updateData:[]
        }
    },
    computed:{},
    mounted(){
        this.veriGetir()

    },
    methods:{
        veriGetir(){
            axios.get('/admin/ayarApi').then((response)=>{
                this.ayarlar = response.data
            })
        },
        modalAc(){

            this.$modal.show('yeni-ayar-ekle')
        },
        ayarEkle()
        {
            let formData = new FormData;
            formData.append('ayarAnahtari', this.ayarAnahtari);
            formData.append('ayarDegeri', this.ayarDegeri);

            axios.post('/admin/ayar/ekleApi',formData).then((response)=>{
                if(response.data.status==true){
                    Swal.fire(response.data.message, '', 'success')
                    this.veriGetir();
                }else{
                    Swal.fire(response.data.message, '', 'error')
                }
                
            })
        },
        ayarDuzenle(duzenlenecekVeri){
            this.updateData=duzenlenecekVeri
            this.$modal.show('ayar-duzenle')
            //alert(duzenlenecekVeri.id)
        },
        ayarGuncelle(){
            let formData = new FormData;
            //formData.append('duzenlenecekVeri',  JSON.stringify(this.updateData));
            formData.append('id', this.updateData.id);
            formData.append('ayarAnahtari', this.updateData.ayar_anahtari);
            formData.append('ayarDegeri', this.updateData.ayar_degeri);
          
           
            axios.post('/admin/ayar/guncelleApi',formData).then((response)=>{
                if(response.data.status==true){
                    Swal.fire(response.data.message, '', 'success')
                    this.veriGetir();
                }else{
                    Swal.fire(response.data.message, '', 'error')
                }
                
            })
        },
        ayarSil(duzenlenecekVeri){
            //alert(duzenlenecekVeri.id)
            Swal.fire({
                title: '"'+duzenlenecekVeri.ayar_anahtari+'" sayfasını silmek istediğinize emin misiniz?',
                showDenyButton: true,
                showCancelButton: false,
                confirmButtonText: 'Sayfayı sil',
                denyButtonText: `Vazgeçtim`,
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    let formData = new FormData;
                    formData.append('id', duzenlenecekVeri.id);
                    axios.post('/admin/ayar/silApi',formData).then((response)=>{
                        if(response.data.status==true){
                            Swal.fire(response.data.message, '', 'success')
                            this.veriGetir();
                        }else{
                            Swal.fire(response.data.message, '', 'error')
                        }
                    })
                } else if (result.isDenied) {
                    Swal.fire('Değişiklik yapılmamıştır', '', 'info')
                }
            })
        }
            
        

    }
}
</script>
