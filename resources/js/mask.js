import $ from 'jquery';
import 'jquery-mask-plugin';
import { split } from 'lodash';

// Agora você pode usar o jQuery com o alias '$'
$(document).ready(function() {
    var SPMaskBehavior = function (val) {
        return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
    }, spOptions = {
        onKeyPress: function (val, e, field, options) {
            field.mask(SPMaskBehavior.apply({}, arguments), options);

        },
        placeholder: "(00) 0000-0000"
    };

    $('.housephone').mask(SPMaskBehavior, spOptions);
    $('.messagephone').mask(SPMaskBehavior, spOptions);
    $('.officephone').mask(SPMaskBehavior, spOptions);
    $('.cellphone').mask(SPMaskBehavior, spOptions);


    /// itens de pedido
    $('.cep').mask("00.000-000", { placeholder: "00.000-000" });
    $('.rg').mask("000000000000000");

    $('.year').mask("0000");
    $('.twodigits').mask("00");
    $('.threedigits').mask("000");
    $('.moneyReal').mask("#.##0,00", {reverse: true , placeholder: "R$ "});

    $('.cpf').mask('000.000.000-00', { reverse: true });

    $("input[name=cep]").on('blur',function(){
        var cep = $(this).val().replace(/[^0-9]/, '');
        var data_class = $(this).attr('data-class');
//        console.log(data_class);
		if(cep){
			var url = 'https://viacep.com.br/ws/'+ cep + '/json/' ;
			$.ajax({
                    url: url,
                    dataType: 'jsonp',
                    crossDomain: true,
                    contentType: "application/json",
                    success: function(json) {
                        if (!json.erro) {
                            $("input[name=logradouro]").val(json.logradouro);
                            $("input[name=bairro]").val(json.bairro);
                            $("input[name=localidade]").val(json.localidade);
                            $("input[name=uf]").val(json.uf);
                            $("input[name=numero]").focus();
						}else{
                            $("input[name=logradouro]").val('');
                            $("input[name=bairro]").val('');
                            $("input[name=localidade]").val('');
                            $("input[name=uf]").val('');
                            $("input[name=numero]").val('');
                            $("input[name=cep]").focus();

                            $(document).Toasts('create', {
                                class: 'bg-danger',
                                title: 'Atenção',
                                subtitle: 'Erro',
                                body: 'Cliente <strong>CEP Não existe</strong>',
                                autohide:true,
                                close: false,
                            });
                        }
					}
			});
		}


    });

    // init responses
    $("[name*='question'].mix").filter(function() {

        if(this.checked){
            var name = this.name.split('_');
            if(this.value == 0){
                $("[name*='response_"+name[1]+"']").css("display","none");
                $("[name*='response_"+name[1]+"']").attr("disabled", true);
                $("[name*='response_"+name[1]+"']").val("");
            }else{
                $("[name*='response_"+name[1]+"']").css("display","block");
                $("[name*='response_"+name[1]+"']").attr("disabled", false);
            }
        }
    });



    $(".mix").on('change',function(){
        var name = this.name.split('_');
        if(this.value == 0){
            $("[name*='response_"+name[1]+"']").css("display","none");
            $("[name*='response_"+name[1]+"']").attr("disabled", true);
            $("[name*='response_"+name[1]+"']").val("");
        }else{
            $("[name*='response_"+name[1]+"']").css("display","block");
            $("[name*='response_"+name[1]+"']").attr("disabled", false);
        }
    });
});

