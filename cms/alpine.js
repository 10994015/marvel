const alpineList = ()=>{
    return {
        init(){
        },
        list:{
            1:{show:true},
            2:{show:false}
        },
        data: [... list],
        selectnum :10,
        currpage:1,
        totalLength:total,
        pagenum: Math.ceil(this.totalLength / this.selectnum),
        toggleList(type){
            this.list[1].show = false
            this.list[2].show = false
            this.list[type].show = true
        },
        tableToExel(){
            var table2excel = new Table2Excel();
            if(this.list[1].show){
                this.list[2].show = true
                table2excel.export(document.querySelectorAll('table'));
            }else{
                this.list[1].show = true
                table2excel.export(document.querySelectorAll('table'));
            }
        },
        getData(){
            return this.data.slice((this.currpage-1)*this.selectnum, (this.currpage-1)*this.selectnum + this.selectnum);
        },
        initPage(){
            this.currpage = 1
        },
        changePage(add){
            this.currpage  = this.currpage + add;
            this.getData();
        }
    }
}