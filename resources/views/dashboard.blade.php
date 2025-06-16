<x-layouts.app :title="__('Dashboard')">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">



        <div class="container">
        
        <div class="item1"> <a href="{{ route('bank.index') }}">Bancos</a></div>
        <div class="item2"> <a href="{{ route('usuarios.index') }}">Contas</a></div>
       

        
        
        </div>
    </div>


    <style>

    body{
        background-color:#F0FFFF; 

    }
    .container{
        display:flex;
        flex-direction: column;

        justify-content: center;
    }

    .container:hover{
        
       



        /* background-color :purple; */
    }

    </style>


</x-layouts.app>

