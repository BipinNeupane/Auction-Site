var extra_info = document.getElementById('extra-information');

var category = <?php echo $products->category->category_id; ?>;
console.log(category);

const fields = {
    '1': `<p>
        <strong>Drawing Medium:</strong> {{$products->material_used}}
      </p>
      <p>
      <strong>Framed:</strong> ${is_framed(<?php echo $products->is_framed; ?>)}
      </p>
      <p>
        <strong>Height:</strong> {{$products->height}} cm
      </p>
      <p>
        <strong>Length:</strong> {{$products->length}} cm
      </p>
      `,
      '2': `<p>
        <strong>Painting Medium:</strong> {{$products->material_used}}
      </p>
      <p>
      <strong>Framed:</strong> ${is_framed(<?php echo $products->is_framed; ?>)}
      </p>
      <p>
        <strong>Height:</strong> {{$products->height}} cm
      </p>
      <p>
        <strong>Length:</strong> {{$products->length}} cm
      </p>
      `,
      '3': `<p>
        <strong>Photograph Type:</strong> {{$products->type}}
      </p>
      <p>
        <strong>Height:</strong> {{$products->height}} cm
      </p>
      <p>
        <strong>Length:</strong> {{$products->length}} cm
      </p>
      `,
      '4': `<p>
        <strong>Material Used:</strong> {{$products->material_used}}
      </p>
      <p>
        <strong>Height:</strong> {{$products->height}} cm
      </p>
      <p>
        <strong>Length:</strong> {{$products->length}} cm
      </p>
      <p>
        <strong>Width:</strong> {{$products->width}} cm
      </p>
      <p>
        <strong>Weight:</strong> {{$products->weight}} cm
      </p>
      `,
      '5': `<p>
        <strong>Materials Used:</strong> {{$products->material_used}}
      </p>
      <p>
      <strong>Framed:</strong> ${is_framed(<?php echo $products->is_framed; ?>)}
      </p>
      <p>
        <strong>Height:</strong> {{$products->height}} cm
      </p>
      <p>
        <strong>Length:</strong> {{$products->length}} cm
      </p>
      `,
};

function is_framed(value){
    return value == 1 ? "Yes" : "No";
}

console.log(fields[category]);

extra_info.innerHTML = fields[category];
