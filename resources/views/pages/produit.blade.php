@extends('layouts.default')

@section('content')
<div class="row">
    <div class="col-12 text-center mb-4">
        <h1>Panier</h1>
    </div>

    <div class="col-sm-12 col-md-10 offset-md-1">
        <table class="table table-hover align-middle">
            <thead>
                <tr>
                    <th>Produit</th>
                    <th>Quantité</th>
                    <th class="text-center">Prix</th>
                    <th class="text-center">Total</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="col-sm-8 col-md-6">
                        <div class="d-flex align-items-center">
                            <a class="thumbnail me-3" href="#">
                                <img src="https://icons.iconarchive.com/icons/custom-icondesign/flatastic-2/72/product-icon.png" style="width: 72px; height: 72px;">
                            </a>
                            <div>
                                <h5 class="m-0"><a href="#" class="text-decoration-none text-dark">Nom du produit</a></h5>
                                <small>Par <a href="#" class="text-decoration-none">Nom de marque</a></small>
                                <br>
                                <span>Statut: </span><span class="text-success fw-bold">En stock</span>
                            </div>
                        </div>
                    </td>
                    <td class="col-sm-1 col-md-1" style="text-align: center">
                        <input type="number" class="form-control" value="3" min="1">
                    </td>
                    <td class="col-sm-1 col-md-1 text-center"><strong>$4.87</strong></td>
                    <td class="col-sm-1 col-md-1 text-center"><strong>$14.61</strong></td>
                    <td class="col-sm-1 col-md-1">
                        <button type="button" class="btn btn-danger btn-sm">
                            <i class="bi bi-trash"></i> Supprimer
                        </button>
                    </td>
                </tr>

                <tr>
                    <td class="col-md-6">
                        <div class="d-flex align-items-center">
                            <a class="thumbnail me-3" href="#">
                                <img src="https://icons.iconarchive.com/icons/custom-icondesign/flatastic-2/72/product-icon.png" style="width: 72px; height: 72px;">
                            </a>
                            <div>
                                <h5 class="m-0"><a href="#" class="text-decoration-none text-dark">Nom du produit</a></h5>
                                <small>Par <a href="#" class="text-decoration-none">Nom de marque</a></small>
                                <br>
                                <span>Statut: </span><span class="text-warning fw-bold">Expédié sous 2-3 semaines</span>
                            </div>
                        </div>
                    </td>
                    <td class="col-md-1" style="text-align: center">
                        <input type="number" class="form-control" value="2" min="1">
                    </td>
                    <td class="col-md-1 text-center"><strong>$4.99</strong></td>
                    <td class="col-md-1 text-center"><strong>$9.98</strong></td>
                    <td class="col-md-1">
                        <button type="button" class="btn btn-danger btn-sm">
                            <i class="bi bi-trash"></i> Supprimer
                        </button>
                    </td>
                </tr>

                <tr>
                    <td colspan="3"></td>
                    <td><h5>Sous-total</h5></td>
                    <td class="text-end"><h5><strong>$24.59</strong></h5></td>
                </tr>
                <tr>
                    <td colspan="3"></td>
                    <td><h5>Livraison</h5></td>
                    <td class="text-end"><h5><strong>$6.94</strong></h5></td>
                </tr>
                <tr>
                    <td colspan="3"></td>
                    <td><h3>Total</h3></td>
                    <td class="text-end"><h3><strong>$31.53</strong></h3></td>
                </tr>
                <tr>
                    <td colspan="3"></td>
                    <td>
                        <button type="button" class="btn btn-secondary">
                            <i class="bi bi-cart"></i> Continuer vos achats
                        </button>
                    </td>
                    <td class="text-end">
                        <button type="button" class="btn btn-success">
                            Payer <i class="bi bi-play-fill"></i>
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
