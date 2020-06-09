<div class="container-fluid d-flex justify-content-center">
    <label for="" class="font-size text-primary"> Création de question</label>
</div>

<div class="container" style="height:380px;">
    <form action="">
        
        <div class="row form-group">
            <label for="" class="col-md-1"> Question</label>
            <textarea class="form-control w-75 col-md-9" name="" id="" rows="3"></textarea>
        </div>
        
        <div class="row form-group">
            <label for="" class="col-md-1"> points</label>
            <input type="number" min="1" name="" id="" class="form-control col-md-3" placeholder="" aria-describedby="helpId">
        </div>

        <div class="row form-group">
            <label for="" class="col-md-1"> Type de réponses </label>
            <select class="custom-select col-md-9">
                <option selected>Choisissez une option</option>
                <option value="1">Texte</option>
                <option value="2">Simple</option>
                <option value="3">multiple</option>
            </select>
            <button type="button" class="btn btn-primary col-md-0.3 " style="border: 1px solid white; border-radius: 50%; height:35px;">X</button>
        </div>

    </div>

    <div class="container-fluid col-md-12">
        <button type="button" class="btn btn-primary" style="margin-left: 40%; font-weight:bolder"> Ajouter la question</button>
    </div>

</form>

