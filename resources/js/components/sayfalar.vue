<template>
    <div>

        <modal name="yeni-sayfa-ekle" height="auto">
            <div class="container">
                <h1 class="display-3">Yeni Sayfa Ekle</h1><br>
                <form >
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Sayfa Adı" v-model="sayfaAdi">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="icerik">Sayfa İçeriği</label>
                                <textarea name="" v-model="sayfaIcerik" id="icerik" cols="60" rows="10"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" v-model="sayfaMetaAciklamasi" class="form-control" id="exampleFormControlInput1" placeholder="Sayfa Meta Açıklaması">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text"  v-model="sayfaAnahtarKelimeler" class="form-control" id="exampleFormControlInput1" placeholder="Sayfa Meta Anahtar Kelimeleri (Meta Keywords)">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <select v-model="sayfaDurumu" class="custom-control form-select btn-block" aria-label="Default select example">
                                <option selected>Sayfa Durumu</option>
                                <option value="aktif">Aktif</option>
                                <option value="pasif">Pasif</option>
                            </select>
                        </div>
                       
                    </div><br>

                    <div class="row">
                        <div class="col-md-12">
                            <select v-model="sayfaTipi" class="custom-control form-select btn-block" aria-label="Default select example">
                                <option selected>Tip Seçiniz</option>
                                <option value="anasayfa">Anasayfa</option>
                                <option value="icerikSayfasi">İçerik Sayfası</option>
                                <option value="kategori">Kategori</option>
                            </select>
                        </div>
                       
                    </div><br>
                    <div class="row">
                        <div class="col-md-12">
                            <button type="button" class="btn btn-outline-default btn-block" @click="sayfaEkle">Kaydet</button>
                        </div>
                    </div>
                </form><br>
            </div>
            
        </modal>

        <modal name="sayfa-duzenle" height="auto">
            <div class="container">
                <h1 class="display-3">"{{updateData.sayfa_basligi}}" Sayfasını Düzenle</h1><br>
                
                <form >
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Sayfa Adı" v-model="updateData.sayfa_basligi">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="icerik">Sayfa İçeriği</label>
                                <tinymce id="d1" v-model="updateDataIcerik" ></tinymce>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text"  v-model="updateData.sayfa_aciklamasi" class="form-control" id="exampleFormControlInput1" placeholder="Sayfa Meta Açıklaması">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text"  v-model="updateData.sayfa_anahtar_kelimeler"  class="form-control" id="exampleFormControlInput1" placeholder="Sayfa Meta Anahtar Kelimeleri (Meta Keywords)">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <select  v-model="updateData.sayfa_durumu" class="custom-control form-select btn-block" aria-label="Default select example">
                                <option selected>Sayfa Durumu</option>
                                <option value="aktif">Aktif</option>
                                <option value="pasif">Pasif</option>
                            </select>
                        </div>
                       
                    </div><br>

                    <div class="row">
                        <div class="col-md-12">
                            <select v-model="updateData.sayfa_tipi" class="custom-control form-select btn-block" aria-label="Default select example">
                                <option selected>Tip Seçiniz</option>
                                <option value="anasayfa">Anasayfa</option>
                                <option value="icerikSayfasi">İçerik Sayfası</option>
                                <option value="kategori">Kategori</option>
                            </select>
                        </div>
                       
                    </div><br>
                    <div class="row">
                        <div class="col-md-12">
                            <button type="button" class="btn btn-outline-default btn-block" @click="sayfaGuncelle">Güncelle</button>
                        </div>
                    </div>
                </form><br>
            </div>
            
        </modal>

        <div class="row">
            <div class="col-8">

                <button type="button" class="btn btn-outline-info" @click="sayfaFiltre('aktif')">Aktif Sayfalar</button>
                <button type="button" class="btn btn-outline-warning"  @click="sayfaFiltre('pasif')">Pasif Sayfalar</button>
                <button type="button" class="btn btn-outline-default"  @click="veriGetir()">Varsayılan</button>
            </div>
            <div class="col-4">
                <button type="button" class="btn btn-outline-default" @click="modalAc">Yeni Sayfa Ekle</button>
            </div>
        </div>
        <br>
        <div class="table-responsive">
            <table class="table align-items-center">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">Sayfa Adı</th>
                        <th scope="col">Durumu</th>
                        <th scope="col">Sayfa Tipi</th>
                        <th scope="col">Ayarlar</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="sayfa in sayfalar">
                        
                        <th scope="row">
                            <div class="media align-items-center">
                            
                                <div class="media-body">
                                    <span class="mb-0 text-sm">{{sayfa.id}}</span>
                                </div>
                            </div>
                        </th>
                        <th scope="row">
                            <div class="media align-items-center">
                            
                                <div class="media-body">
                                    <span class="mb-0 text-sm">{{sayfa.sayfa_basligi}}</span>
                                </div>
                            </div>
                        </th>
                        <td>
                            <span class="badge badge-dot mr-4" v-if="sayfa.sayfa_durumu=='aktif'"> 
                            <i class="bg-success" ></i> Aktif
                            </span>
                            <span class="badge badge-dot mr-4" v-if="sayfa.sayfa_durumu=='pasif'"> 
                            <i class="bg-warning"></i> Pasif
                            </span>
                        </td>
                    
                        <td scope="row">
                            <div class="media align-items-center">
                            
                                <div class="media-body">
                                    <span class="mb-0 text-sm" v-if="sayfa.sayfa_tipi=='anasayfa'">Anasayfa</span>
                                    <span class="mb-0 text-sm" v-if="sayfa.sayfa_tipi=='kategori'">Kategori</span>
                                    <span class="mb-0 text-sm" v-if="sayfa.sayfa_tipi=='icerikSayfasi'">İçerik Sayfası</span>
                                </div>
                            </div>
                        </td>
                        <td class="text-right">
                            <div class="dropdown">
                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                    <a class="dropdown-item" @click="sayfaDuzenle(sayfa)">Düzenle</a>
                                    <a class="dropdown-item" @click="sayfaSil(sayfa)" >Sil</a>
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
            sayfaAdi:'',
            sayfaIcerik:'',
            sayfaMetaAciklamasi:'',
            sayfaAnahtarKelimeler:'',
            sayfaDurumu:'',
            sayfaTipi:'',
            updateDataIcerik:'',
            sayfalar:[],
            updateData:[]
        }
    },
    computed:{},
    mounted(){
        this.veriGetir()

    },
    methods:{
        veriGetir(){
            axios.get('/admin/sayfalarApi').then((response)=>{
                this.sayfalar = response.data
            })
        },
        sayfaFiltre(filtre){
            axios.get('/admin/sayfalarFiltreApi/'+filtre).then((response)=>{
                this.sayfalar = response.data
            })
        },
        modalAc(){

            this.$modal.show('yeni-sayfa-ekle')
        },
        sayfaEkle()
        {
            let formData = new FormData;
            formData.append('sayfaAdi', this.sayfaAdi);
            formData.append('sayfaIcerik', this.sayfaIcerik);
            formData.append('sayfaMetaAciklamasi', this.sayfaMetaAciklamasi);
            formData.append('sayfaAnahtarKelimeler', this.sayfaAnahtarKelimeler);
            formData.append('sayfaDurumu', this.sayfaDurumu);
            formData.append('sayfaTipi', this.sayfaTipi);

            axios.post('/admin/sayfalar/ekleApi',formData).then((response)=>{
                if(response.data.status==true){
                    Swal.fire(response.data.message, '', 'success')
                    this.veriGetir();
                }else{
                    Swal.fire(response.data.message, '', 'error')
                }
                
            })
        },
        sayfaDuzenle(duzenlenecekVeri){
            this.updateData=duzenlenecekVeri
            this.updateDataIcerik=duzenlenecekVeri.sayfa_icerik
            this.$modal.show('sayfa-duzenle')
            //alert(duzenlenecekVeri.id)
        },
        sayfaGuncelle(){
            let formData = new FormData;
            //formData.append('duzenlenecekVeri',  JSON.stringify(this.updateData));
            formData.append('id', this.updateData.id);
            formData.append('sayfaAdi', this.updateData.sayfa_basligi);
            formData.append('sayfaIcerik', this.updateData.sayfa_icerik);
            formData.append('sayfaMetaAciklamasi', this.updateData.sayfa_aciklamasi);
            formData.append('sayfaAnahtarKelimeler', this.updateData.sayfa_anahtar_kelimeler);
            formData.append('sayfaDurumu', this.updateData.sayfa_durumu);
            formData.append('sayfaTipi', this.updateData.sayfa_tipi);
           
            axios.post('/admin/sayfalar/guncelleApi',formData).then((response)=>{
                if(response.data.status==true){
                    Swal.fire(response.data.message, '', 'success')
                    this.veriGetir();
                }else{
                    Swal.fire(response.data.message, '', 'error')
                }
                
            })
        },
        sayfaSil(duzenlenecekVeri){
            //alert(duzenlenecekVeri.id)
            Swal.fire({
                title: '"'+duzenlenecekVeri.sayfa_basligi+'" sayfasını silmek istediğinize emin misiniz?',
                showDenyButton: true,
                showCancelButton: false,
                confirmButtonText: 'Sayfayı sil',
                denyButtonText: `Vazgeçtim`,
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    let formData = new FormData;
                    formData.append('id', duzenlenecekVeri.id);
                    axios.post('/admin/sayfalar/silApi',formData).then((response)=>{
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
