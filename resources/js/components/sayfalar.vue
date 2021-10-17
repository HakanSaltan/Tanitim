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
                                <option value="1">Anasayfa</option>
                                <option value="2">İçerik Sayfası</option>
                                <option value="3">Kategori</option>
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
        <div class="row">
            <div class="col-8"></div>
            <div class="col-4">
                <button type="button" class="btn btn-outline-default" @click="modalAc">Yeni Sayfa Ekle</button>
            </div>
        </div>
        <br>
        <div class="table-responsive">
            <table class="table align-items-center">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">Sayfa Adı</th>
                        <th scope="col">Durumu</th>
                        <th scope="col">Ayarlar</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="sayfa in sayfalar">
                        
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
                    
                        <td class="text-right">
                            <div class="dropdown">
                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                    <a class="dropdown-item" :href="'/admin/sayfa/duzenle/'+sayfa.id">Düzenle</a>
                                    <a class="dropdown-item" href="#">Sil</a>
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
            sayfalar:[]
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
                    alert(response.data.message)
                    this.veriGetir();
                }else{
                    alert(response.data.message)
                }
                
            })
        }
    }
}
</script>
