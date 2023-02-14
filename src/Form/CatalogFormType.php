<?php

namespace App\Form;

use App\Entity\Foodrinks;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FoodrinksFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('item')
            ->add('price')
            ->add('stock')
            ->add('submit', SubmitType::class);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Foodrinks::class,
        ]);
    }
}

class FoodrinksNewItemFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('item')
            ->add('price')
            ->add('category')
            ->add('stock')
            ->add('stock_min')
            ->add('submit', SubmitType::class);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Foodrinks::class,
        ]);
    }
}
?>



<!-- 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>    
<script src="styles/js/jquery.js"></script>
<script src="styles/js/bootstrap.min.js"></script>
</head>
<body>
<form class="mt-4">
			<div class="form-group">
            <label for="name">Nombre
            </label>
            <input type="text" value="{{$builder.item}}" class="form-control" id="name" required>            
        </div>
        <div class="form-group">
            <label for="descripcion">Descripción</label>
            <input type="textarea" class="form-control" id="descripcion" required>
        </div>
        <div class="form-group">
            <label for="precio">Precio</label>
            <input type="text" class="form-control" id="precio" required>
        </div>
        <div class="form-group">
            <label for="stockN">Stock inicial</label>
            <input type="number" class="form-control" id="stockN" required>


            <a href="main/main.html" type="submit" class="btn btn-outline-success align-items-center mx-auto d-flex justify-content-center text-center mt-5" id="btnSubmit">
                <strong>Guardar</strong>
            </a>
    </form> 
</body>
</html> -->
