// Exemplo de pattern para validação de campo telefone e whatsapp
// <input type="tel" name="telefone/whatsapp" placeholder="Telefone/WhatsApp" pattern="\([0-9]{2}\)[\s][0-9]{4,5}-[0-9]{4}" required>
var $;
$(document).ready(function () {
  /**
   * @return {string}
   */
  let SPMaskBehavior = function (val) {
    return val.replace(/\D/g, "").length === 11
      ? "(00) 00000-0000"
      : "(00) 0000-00009";
  },
    spOptions = {
      onKeyPress: function (val, e, field, options) {
        field.mask(SPMaskBehavior.apply({}, arguments), options);
      }
    };

  $(
    'input[name="tel"], input[name="telefone"], input[type="tel"], .cel, .tel, .telefone, .whatsapp'
  ).mask(SPMaskBehavior, spOptions);
  $(".data, .dt").mask("00/00/0000");
  $(".cep").mask("00000-000");
  $(".cpf").mask("000.000.000-00", { reverse: false });
  $(".cnpj").mask("00.000.000/0000-00", { reverse: false });

  /*$('input[name="valor"], input[name="preco"], .preco, .valor').maskMoney({
        prefix: 'R$ ' ,
        thousands: ".",
        decimal: ","
    }); */
});
